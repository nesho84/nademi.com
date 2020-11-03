<?php

class MessageHelper
{
    /**
     * Display Message if no data
     * @param string $msg for showing the message
     * @param bool $backButton display the back button
     * @return string
     */
    public static function showMessage($msg, $backButton = false)
    {
        echo '
        <div class="row mb-4">
            <div class="col">
                <div class="card border-0 shadow text-muted">
                    <div class="card-body text-center h-100">
                        <div class="card-text text-black-50 mt-5"><h2><i class="fas fa-info-circle fa-2x"></i><br/><br/>' . $msg . '</h2></div>
                    </div>
                </div>
            </div>
        </div>';

        if ($backButton) {
            echo '
            <div class="row my-4">
                <div class="col-xl-4 col-md-4 mx-auto">
                    <button onclick="window.history.back()" type="button" class="btn btn-primary btn-block "><i class="fas fa-angle-double-left ml-1"></i> Go Back</button>
                </div>
            </div>';
        }
    }
}
