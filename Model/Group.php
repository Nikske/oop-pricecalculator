<?php


class Group {

    private $id;
    private $name;
    private $fixed;
    private $variable;
    private $group_id;

    /**
     * Group constructor.
     * @param $id
     * @param $name
     * @param $fixed
     * @param $variable
     * @param $group_id
     */
    public function __construct($id, $name, $fixed, $variable, $group_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->fixed = $fixed;
        $this->variable = $variable;
        $this->group_id = $group_id;
    }


}