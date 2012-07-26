<?php
namespace proof\app;
/**
 * timestamp Jul 25, 2012 5:21:53 PM
 *
 *
 * @author Lasana Murray  <dev@trinistorm.org>
 * @copyright 2012 Lasana Murray
 * @package proof\app
 *
 *  Interface for controllers that carry out application logic.
 *
 */
use proof\util\Observable;

interface LogicController extends Controller, Observable
{

    public function getContent();

    public function next();

    public function getTemplate();

}