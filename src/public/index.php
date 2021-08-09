<?php

/**
 * EmployeeInstance
 */
class EmployeeInstance
{
    /**
     * id
     *
     * @var mixed
     */
    private $id;

    /**
     * name
     *
     * @var mixed
     */
    private $name;

    /**
     * email
     *
     * @var mixed
     */
    private $email;

    /**
     * construct
     *
     * @param mixed $id 
     * @param mixed $name 
     * @param mixed $email 
     */
    public function __construct($id, $name, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * getId
     *
     * @return void
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * getName
     *
     * @return void
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * getEmail
     *
     * @return void
     */
    public function getEmail()
    {
        return $this->email;
    }
}

/**
 * EmployeeInterface
 */
interface EmployeeInterface
{
    /**
     * getEmployees
     *
     * @return void
     */
    public function getEmployees();
}

/**
 * EmployeeRepository
 */
class EmployeeRepository implements EmployeeInterface
{
    /**
     * employees
     *
     * @var mixed
     */
    private $employees;

    /**
     * construct
     */
    public function __construct()
    {
        $this->employees = [
            1 => new EmployeeInstance(1, 'tienpham', 'tienpd@co.gmai'),
            2 => new EmployeeInstance(2, 'trinhle', 'trinh@gmeo.c')
        ];
    }

    /**
     * getEmployees
     *
     * @return void
     */
    public function getEmployees()
    {
        return $this->employees;
    }
}

/**
 * EmployeeControl
 */
class EmployeeControl
{
    /**
     * repository
     *
     * @var mixed
     */
    private $repository;

    /**
     * construct
     *
     * @param EmployeeInterface $repository 
     */
    public function __construct(EmployeeInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * getEmployees
     *
     * @return void
     */
    public function getEmployees()
    {
        return $this->repository->getEmployees();
    }
}

$employee = new EmployeeControl(new EmployeeRepository());
$employee->getEmployees();
