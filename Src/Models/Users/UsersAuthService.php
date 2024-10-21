<?php
namespace Src\Models\Users;
use Src\Models\Users\User;

class UsersAuthService{
    public static function createToken(User $user): void{
        $token = $user->getId().':'.$user->getAuthToken();
        
        setcookie('token', $token, time()+60*60,'/', '', false, true);
        //var_dump($token);
    }
    public static function getUserByToken(): ?User{
        $token = $_COOKIE['token'] ?? '';
        if (empty($token)) {
            return null;
        }
        [$userId, $authToken] = explode(':', $token, 2);

        $user = User::getById((int) $userId);
        if ($user === null) {
            return null;
        }
        if ($user->getAuthToken() !== $authToken) {
            return null;
        }
        return $user;
    }
}