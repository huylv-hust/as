<?php echo $user['member_kaiinName']?>様
このたびは、Usappyオートサービスで<?php echo \Constants::$pit_work[$menu_code]?>をご予約いただき誠にありがとうございます。
ご予約いただいた内容をお知らせします。

予約番号：<?php echo $reservation_no?>

氏名：<?php echo $user['member_kaiinName']?>様
予約日時：<?php $time =str_replace('-0','-',$start_time); $time = str_replace(' ','日',preg_replace('/(-)([0-9]+)(-)/','年$2月',$start_time)); echo $time.'〜'  ?>

予約内容：<?php if($menu_code == 'other') echo $menu_name; else echo \Constants::$pit_work[$menu_code]; ?>

店舗：<?php echo $ss_info['ss_name']?>

地図：https://usappy.jp/ss/<?php echo $sscode ?>


予約を変更・キャンセルされる際はこちらの画面からお願いします。
ネットからの変更・キャンセル期限を過ぎている場合は直接店舗へご連絡ください。
<?php if(isset($href_inspection)){ ?>
<?php echo $href_inspection; ?>
<?php echo ''; ?>

<?php }else {?>
https://usappy.jp/as/reservation/

<?php }?>

■予約確認メールについて
ご来店時には本メールをプリントアウトしてご持参いただくか、携帯電話の画面を店頭スタッフへお見せ下さい。

■UsappyオートサービスTOPへ
https://usappy.jp/as/

■お問い合わせ窓口
※お問い合わせの際は必ず[予約番号]をお知らせ下さい。
http://usami-faq.okbiz.okwave.jp/
(営業時間 10:30～17:00 土・日・祝・12/29～1/3休)
※[upcm.jp]からのメールを受信できるよう設定して下さい。
※[usami-group.co.jp]からのメールを受信できるよう設定して下さい。