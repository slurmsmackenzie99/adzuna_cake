<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Posting;
use Authorization\IdentityInterface;

/**
 * Posting policy
 */
class PostingPolicy
{
    /**
     * Check if $user can create Posting
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Posting $posting
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Posting $posting)
    {
        //canCreate
        //all logged users can post job listings
        return true;
    }

    /**
     * Check if $user can update Posting
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Posting $posting
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Posting $posting)
    {
        //logged users can update their own articles
        return $this->isAuthor($user, $posting);
    }

    /**
     * Check if $user can delete Posting
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Posting $posting
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Posting $posting)
    {
        return $this->isAuthor($user, $posting);
    }

    /**
     * Check if $user can view Posting
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Posting $posting
     * @return bool
     */
//    public function canView(IdentityInterface $user, Posting $posting)
//    {
//    }
    protected function isAuthor(IdentityInterface $user, Posting $posting)
    {
        return $posting->user_id === $user->getIdentifier();
    }
}
