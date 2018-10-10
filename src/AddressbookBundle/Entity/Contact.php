<?php

namespace AddressbookBundle\Entity;

use AddressbookBundle\AddressbookBundle;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AddressbookBundle\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Phone", mappedBy="contact", cascade={"persist"}, orphanRemoval=true)
     */
    private $phones;

    /**
     * @ORM\OneToMany(targetEntity="Email", mappedBy="contact", cascade={"persist"}, orphanRemoval=true)
     */
    private $emails;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="zip", type="string", length=10)
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=50)
     */
    private $country;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="datetime", nullable=true)
     */
    private $dob;

    public function __construct()
    {
        $this->emails = new ArrayCollection();
        $this->phones = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Contact
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Contact
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Contact
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zip
     *
     * @param string $zip
     *
     * @return Contact
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Contact
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Contact
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     *
     * @return Contact
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }


    /**
     * @return mixed
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param mixed $phones
     * @return Contact
     */
    public function setPhones($phones)
    {
        foreach($phones as $phone){
            $phone->setContact($this);
        }
        $this->phones = $phones;
        return $this;
    }

    /**
     * Adds an additional email entity to the contact
     * @param Phone $phone
     * @return $this
     */
    public function addPhone(Phone $phone){

        $this->phones->add($phone);
        $phone->setContact($this);
        return $this;
    }

    /**
     * @param Phone $phone
     * @return $this
     */
    public function removePhone(Phone $phone){

        $this->phones->removeElement($phone);
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * @param mixed $emails
     * @return Contact
     */
    public function setEmails($emails)
    {
        foreach($emails as $email){
            $email->setContact($this);
        }
        $this->emails = $emails;

        return $this;
    }

    /**
     * @param Email $email
     * @return $this
     */
    public function addEmail(Email $email){

        $this->emails->add($email);
        $email->setContact($this);
        return $this;
    }

    /**
     * @param Email $email
     * @return $this
     */
    public function removeEmail(Email $email){
        $this->emails->removeElement($email);

        return $this;
    }
}

