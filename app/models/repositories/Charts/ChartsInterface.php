<?php
namespace Repositories\Charts;

interface ChartsInterface {

    	function getAll();
 
	function getById($id);
 
 
	function update($id, array $attributes);
 
    
}
