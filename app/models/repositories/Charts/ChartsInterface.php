<?php
namespace Repositories\Charts;

interface ChartsInterface {

    	function getAll();
 
	function getById($id);
 
	function create(array $attributes);
 
	function update($id, array $attributes);
 
    
}
