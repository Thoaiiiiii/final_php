<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $data = json_decode(file_get_contents('php://input'), true);
        //giả sử đã lưu info user trong db
        $storedCredential = getUserCredentialFromDB($data['credential']);

        function getUserCredentialFromDB($credential) {
            return 'stored_credential_example';
        }

        if(vertifyFaceID($data['creadential'], $stroredCredential)){
            session_start();
            $_SESSION['user'] = $data['username'];
            echo json_encode(['success' => true]);
        }else{
            echo json_encode(['success' => false, 'message' => 'FaceID verification failed']);
        }
    }

    function vertifyFaceID($credential, $storedCredential){
        return $credential == $storedCredential;
    }
?>