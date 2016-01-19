<?php
class RegisterForm extends Form
{
    public function build()
    {
        $this->addFormField('FirstName');
        $this->addFormField('LastName');
        $this->addFormField('Day');
        $this->addFormField('Month');
        $this->addFormField('Year');
        $this->addFormField('Phone');
        $this->addFormField('Address');
        $this->addFormField('Address2');
        $this->addFormField('City');
        $this->addFormField('ZipCode');
			$this->addFormField('Email');
    }
}


//UNE CLASSE PUR CHAQUE FORM