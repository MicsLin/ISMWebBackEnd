<?php
function deleteFile($path = null)
{
    //用is_file防止錯誤 :　unlink(C:\xampp\htdocs\webTest\BackEnd\files\imgs\): Permission denied in
    if (file_exists($path)) {
        // echo "檔案路徑正確，檔案存在。".$path;
        // 刪除圖片檔
        if (is_file($path)) {
            if (unlink($path)) {
                // echo "圖片檔刪除成功。";
                return;
            } else {
                // echo "刪除圖片檔失敗。";
                return;
            }
        }
    } else {
        // echo "檔案路徑不正確，檔案不存在。" . $path;
        return;
    }
}
