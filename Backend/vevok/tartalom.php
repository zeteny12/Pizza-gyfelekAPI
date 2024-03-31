<?php
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            require_once './getvevo.php';
            break;
        
            case 'POST':
                require_once './postvevo.php';
                break;

                case 'PUT':
                    require_once './putvevo.php';
                    break;

                    case 'DELETE':
                        require_once './deletevevo.php';
                        break;
        default:
            break;
    }