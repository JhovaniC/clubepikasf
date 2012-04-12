<?php

namespace Epika\ClubBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Epika\ClubBundle\Entity\User
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $username
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;
    
    /**
     * 
     * @ORM\OneToOne(targetEntity="Role")
     */
    private $role;
    
    /**
     * @var string $salt
     * 
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;

    /**
     * @var datetime $updated_at
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updated_at;

    /**
     * @var boolean $isActive
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    
    /********************************************* Class functions ***************************************/
    
    public function __construct()
    {
    	$this->isActive = true;
    	$this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
    }
    
    /**
     * Get Role
     * @return Epika\ClubBundle\Entity\Role
     */
    public function getRoles()
    {
    	return $this->role;
    }
    
    /**
     * (non-PHPdoc)
     * @see Symfony\Component\Security\Core\User.UserInterface::equals()
     */
    public function equals(UserInterface $user)
    {
    	return $user->getUsername() === $this->username;
    }
    
    /**
     * (non-PHPdoc)
     * @see Symfony\Component\Security\Core\User.UserInterface::eraseCredentials()
     */
    public function eraseCredentials()
    {
    }
    
    /**
     * (non-PHPdoc)
     * @see Symfony\Component\Security\Core\User.UserInterface::getUsername()
     */
    public function getUsername()
    {
    	return $this->username;
    }
    
    /**
     * (non-PHPdoc)
     * @see Symfony\Component\Security\Core\User.UserInterface::getSalt()
     */
    public function getSalt()
    {
    	return $this->salt;
    }
    
    /**
     * (non-PHPdoc)
     * @see Symfony\Component\Security\Core\User.UserInterface::getPassword()
     */
    public function getPassword()
    {
    	return $this->password;
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    }

    /**
     * Get updated_at
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set role
     *
     * @param Epika\ClubBundle\Entity\Role $role
     */
    public function setRole(\Epika\ClubBundle\Entity\Role $role)
    {
        $this->role = $role;
    }

}