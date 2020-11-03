<?php

class Controller
{
    public function __construct()
    {
        // Loading View
        $this->view = new View();
    }

    /**
     * Loading the Model
     * @param $model_folder string Model path
     * @param $model string Model name
     * @return current new Model
     */
    public function loadModel($model_folder, $model)
    {
        if (file_exists(MODELS_PATH . '/' . $model_folder . '/' . $model . '.php'))
        {
            require MODELS_PATH . '/' . $model_folder . '/' . $model . '.php';
        }

        if (class_exists($model))
        {
            return new $model();
        }
        else
        {
            echo "Model class $model not found";
        }
    }
}
