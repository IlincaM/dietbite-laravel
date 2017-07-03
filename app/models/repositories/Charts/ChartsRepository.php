<?php

namespace Repositories\Charts;
use Entities\BmrResult;
/**
 * Description of ChartsRepository
 *
 * @author ilinca
 */
class ChartsRepository implements ChartsInterface {
/*
 * @var $model
 */
    private $model;
    
    public function __construct(BmrResult $model) {
        $this->model= $model;
    }
    public function getAll() {
        return $this->model->all();
    }
    	/**
	 * Get chart by id.
	 *
	 * @param integer $id
	 *
	 * @return App\BmrResult
	 */
	public function getById($id)
	{
		return $this->model->find($id);
	}
 
	/**
	 * Create a new chart.
	 *
	 * @param array $attributes
	 *
	 * @return App\BmrResult
	 */
	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}
 
	/**
	 * Update a chart.
	 *
	 * @param integer $id
	 * @param array $attributes
	 *
	 * @return App\BmrResult
	 */
	public function update($id, array $attributes)
	{
		return $this->model->find($id)->update($attributes);
	}
 
    
    
}
