<?php

namespace Modules\User\Events\Frontend;

use Illuminate\Queue\SerializesModels;
use Modules\User\Entities\User;

/**
 * Class UserLoggedOut.
 */
class UserLoggedOut
{
    use SerializesModels;

    /**
     * @var
     */
    public $user;

    /**
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
