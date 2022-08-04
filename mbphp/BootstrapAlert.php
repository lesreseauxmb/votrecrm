<?php

class BootstrapAlert{
    public static function ShowAlerts(){
        if(!empty($_SESSION['__BootstrapAlert'])){
            foreach($_SESSION['__BootstrapAlert'] as $alert){
                echo '<div class="alert border-0 bg-light-'.$alert['color'].' alert-dismissible fade show py-2">
                <div class="d-flex align-items-center">
                  <div class="fs-3 text-'.$alert['color'].'"><i class="bi bi-check-circle-fill"></i>
                  </div>
                  <div class="ms-3">
                    <div class="text-'.$alert['color'].'">'.$alert['message'].'</div>
                    </div>
                  </div>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            $_SESSION['__BootstrapAlert'] = NULL;
        }
    }

    public static function Success($message){
        $_SESSION['__BootstrapAlert'][] = ["color" => "success","message" => $message];
    }

    public static function Error($message){
        $_SESSION['__BootstrapAlert'][] = ["color" => "danger","message" => $message];
    }
}
