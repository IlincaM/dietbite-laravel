<?php

include( 'AbstractValidator.php');

/**
 * Description of CalculatorValidator
 *
 * @author ilinca
 */
class CalculatorValidator extends AbstractValidator {

    private $values;

    /**
     * 
     * @param array $values
     * @throws Exception
     */
    public function validate(array $values) {

        if ($this->validateAge($values['age']) == false) {

            throw new Exception('Please enter a valid age!');
        }
        if ($this->validateWeight($values['weight']) == false) {
            throw new Exception('Please enter a valid weight!');
        }
        if ($this->validateHeight($values['height']) == false) {
            throw new Exception('Please enter a valid height!');
        }
        if ($this->validateGender($values['gender']) == false) {
            throw new Exception('Please choose your gender !');
        }
        if ($this->validateActivity($values['activity']) == false) {
            throw new Exception('Please choose your Activity Level !');
        }
        if ($this->validateExercise($values['exercise']) == false) {
            throw new Exception('Please choose your Exercise Level !');
        }
    }

}
