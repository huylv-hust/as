<?php echo $user['member_kaiinName']?>様

以下の注文のキャンセル処理が完了しましたので、ご報告致します。

予約番号：<?php echo $reservation_no ?>

氏名：<?php echo $user['member_kaiinName']?>様
予約日時：<?php $time =str_replace('-0','-',$start_time); $time = str_replace(' ','日',preg_replace('/(-)([0-9]+)(-)/','年$2月',$start_time)); echo $time.'〜'  ?>

予約内容：<?php echo $menu_code == 'other' ? $menu_name : \Constants::$pit_work[$menu_code]; ?>

店舗：<?php echo $ss_info['ss_name']?>

地図：https://usappy.jp/ss/<?php echo $sscode ?>

■UsappyオートサービスTOPへ
https://usappy.jp/as/

■お問い合わせ窓口
※お問い合わせの際は必ず[予約番号]をお知らせ下さい。
http://usami-faq.okbiz.okwave.jp/
(営業時間 10:30～17:00 土・日・祝・12/29～1/3休)
※[upcm.jp]からのメールを受信できるよう設定して下さい。
※[usami-group.co.jp]からのメールを受信できるよう設定して下さい。
