<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Chatify\ChatifyMessenger;
use Pusher\Pusher;

class ChatifyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Override the ChatifyMessenger binding to handle missing Pusher config
        $this->app->singleton(ChatifyMessenger::class, function ($app) {
            return new class extends ChatifyMessenger {
                public function __construct()
                {
                    // Only initialize Pusher if all required config values are present
                    $key = config('chatify.pusher.key');
                    $secret = config('chatify.pusher.secret');
                    $appId = config('chatify.pusher.app_id');
                    
                    if ($key && $secret && $appId && $key !== 'local') {
                        $this->pusher = new Pusher(
                            $key,
                            $secret,
                            $appId,
                            config('chatify.pusher.options', []),
                        );
                    } else {
                        // Create a mock Pusher instance for development
                        $this->pusher = new class {
                            public function trigger($channel, $event, $data, $socket_id = null) {
                                // Log the event instead of sending to Pusher
                                \Log::info('Chatify Event (Mock)', [
                                    'channel' => $channel,
                                    'event' => $event,
                                    'data' => $data,
                                    'socket_id' => $socket_id
                                ]);
                                return true;
                            }
                            
                            public function socket_auth($channel, $socket_id) {
                                return json_encode([
                                    'auth' => 'mock_auth_token'
                                ]);
                            }
                            
                            public function presence_auth($channel, $socket_id, $user_id, $user_info = null) {
                                return json_encode([
                                    'auth' => 'mock_auth_token',
                                    'channel_data' => json_encode([
                                        'user_id' => $user_id,
                                        'user_info' => $user_info
                                    ])
                                ]);
                            }
                        };
                    }
                }
            };
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
