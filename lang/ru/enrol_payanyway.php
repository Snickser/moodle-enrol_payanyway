<?php

$string['syncenrolmentstask'] = 'PayAnyWay синхронизация зачислений';
$string['sendexpirynotificationstask'] = 'PayAnyWay отправка уведомлений об истечении срока действия зачисления';
$string['messageprovider:expiry_notification'] = 'Уведомления об истечении срока обучения';

$string['expirymessageenrolledsubject'] = 'Уведомление об окончании обучения';
$string['expirymessageenrolledbody'] = 'Уважаемый(ая) {$a->user}, уведомляем Вас, что обучение в курсе «{$a->course}» истекает {$a->timeend}. При необходимости свяжитесь с {$a->enroller}.';
$string['expirymessageenrollersubject'] = 'Уведомление об окончании обучения';
$string['expirymessageenrollerbody'] = 'Зачисление в курсе «{$a->course}» истекает в течение следующих {$a->threshold} для перечисленных пользователей:

{$a->users}.

Чтобы продлить их зачисление, перейдите на {$a->extendurl}';




$string['pluginname'] = 'PayAnyWay';
$string['pluginname_desc'] = 'Плагин позволяет принимать оплаты курсов через PayAnyWay.';
$string['status'] = 'Разрешить подписку через PayAnyWay';
$string['status_desc'] = 'Позволить пользователям использовать подписку на курс через PayAnyWay по умолчанию.';
$string['cost'] = 'Стоимость записи';
$string['costerror'] = 'Неверный формат стоимости';
$string['costorkey'] = 'Выберите способ записи';
$string['currency'] = 'Валюта';
$string['defaultrole'] = 'Роль по умолчанию';
$string['defaultrole_desc'] = 'Выберите роль, которая будет назначена пользователям при записи через PayAnyWay';
$string['enrolenddate'] = 'Дата окончания';
$string['enrolenddate_help'] = 'Если активно, то пользователь может быть записан только до этой даты.';
$string['enrolenddaterror'] = 'Дата окончания подписки не может быть раньше, чем дата начала';
$string['enrolperiod'] = 'Длительность подписки';
$string['enrolperiod_desc'] = 'Длительность активности подписки по умолчанию (в секундах). Если установлен 0, то по умолчанию длительность будет неограничена.';
$string['enrolperiod_help'] = 'Проолжительность активности записи, начиная с момента записи пользователя на курс. Если отключено, то продолжительность будет неограничена.';
$string['enrolstartdate'] = 'Дата начала';
$string['enrolstartdate_help'] = 'Если активно, то пользователь может быть записан на курс только начиная с этой даты.';
$string['expiredaction'] = 'Действие при истечении зачисления';
$string['expiredaction_help'] = 'Выберите проводимое действие при истечении зачисления пользователя. Пожалуйста, обратите внимание, что некоторые пользовательские данные и настройки будут очищены из курса во время отчисления.';
$string['paymentserver'] = 'URL сервера оплаты';
$string['mntid'] = 'Номер счета';
$string['mntdataintegritycode'] = 'Код проверки целостности данных';
$string['mnttestmode'] = 'Тестовый режим';
$string['payanywaylogin'] = 'Логин в PayAnyWay';
$string['payanywaypassword'] = 'Пароль в PayAnyWay';
$string['assignrole'] = 'Назначить роль';
//$string['nocost'] = 'There is no cost associated with enrolling in this course!';
$string['payanyway:config'] = 'Настройка записи через PayAnyWay';
$string['payanyway:manage'] = 'Управление записавшимися пользователями';
$string['payanyway:unenrol'] = 'Отписать пользователей от курса';
$string['payanyway:unenrolself'] = 'Отписаться от курса';
$string['payanywayaccepted'] = 'Принимаются оплаты через PayAnyWay';
$string['sendpaymentbutton'] = 'Оплатить через PayAnyWay';
$string['unenrolselfconfirm'] = 'Do you really want to unenrol yourself from course "{$a}"?';


/* Errors */
$string['coursenotfound'] = 'Курс не найден';
$string['error_usercourseempty'] = 'пользователь или курс не найдены';
$string['error_payanywaycurrency'] = 'Валюта не принимается платежной системой';
$string['error_txdatabase'] = 'Невозможно создать транзакцию.';


/* Payment systems */
$string['paymentsystem'] = 'Платежная система';
$string['payanyway'] = 'PayAnyWay';
$string['banktransfer'] = 'Банковский перевод';
$string['ciberpay'] = 'CiberPay';
$string['comepay'] = 'Comepay';
$string['contact'] = 'Contact';
$string['elecsnet'] = 'Элекснет';
$string['euroset'] = 'Евросеть, Связной';
$string['forward'] = 'Forward Mobile';
$string['gorod'] = 'Федеральная система ГОРОД';
$string['mcb'] = 'МосКредитБанк';
$string['moneta'] = 'Moneta.ru';
$string['moneymail'] = 'Money Mail';
$string['novoplat'] = 'NovoPlat';
$string['plastic'] = 'VISA, MasterCard, МИР';
$string['platika'] = 'PLATiKA';
$string['post'] = 'ФГУП Почта Росии';
$string['wallet'] = 'Wallet One';
$string['webmoney'] = 'WebMoney';
$string['yandex'] = 'Yandex.Money';
$string['additionalparameters'] = 'Дополнительные параметры';
$string['eurosetrapidaphone'] = 'Номер телефона';
$string['moneymailemail'] = 'Email в Money Mail';
$string['mailofrussiasenderindex'] = 'Индекс отправителя';
$string['mailofrussiasenderregion'] = 'Регион отправителя';
$string['mailofrussiasenderaddress'] = 'Адрес отправителя';
$string['mailofrussiasendername'] = 'Имя отправителя';
$string['webmoneyaccountid'] = 'Источник оплаты';
$string['sbp'] = 'СБП';


/* Invoice */
$string['invoicetitlecreated'] = 'Создано платежное поручение';
$string['invoicetitleerror'] = 'Ошибка создания платежного поручения';
$string['banktransferinvoicecreated'] = '<p>Операция оплаты банковским переводом создана и находится в обработке. Для завершения операции <a onclick="window.open(\'https://{$a->payment_url}/wiretransferreceipt.htm?transactionId={$a->transaction}&paymentSystem.unitId={$a->unitid}\',\'newwindow\',\'1,0,0,0,0,resizable=1,scrollbars=1,width=730,height=670\');return false;" href="#">распечатайте</a> бланк платежного поручения и оплатите квитанцию в любом российском банке.</p>';
$string['postinvoicecreated'] = '<p>Операция оплаты почтовым переводом создана и находится в обработке. Для завершения операции <a target="_blank" href="https://{$a->payment_url}/mailofrussiablank.htm?operationId={$a->transaction}">распечатайте</a> бланк почтового перевода и проведите электронный платеж в любом отделении связи <a target=_blank href=http://www.russianpost.ru>Почты России</a>. Для просмотра бланка в формате PDF необходимо иметь установленную на Вашем компьютере программу <a target=_blank href=http://get.adobe.com/reader/>Adobe Acrobat Reader.</a></p>';
$string['ciberpayinvoicecreated'] = '<p>Для оплаты через CiberPay номер счета для пополнения: {$a->transaction}</p><p>Операция создана, но не оплачена. Для завершения операции Вам необходимо произвести перечисление средств в систему <b>МОНЕТА.РУ</b> через CiberPay, используя вместо номера счета для пополнения данный код:</p><p>{$a->transaction}</p><p>Сумма: {$a->amount}</p><p>Внешняя комиссия: {$a->fee}</p><p>Сумма к оплате: {$a->totalAmount}</p>';
$string['comepayinvoicecreated'] = '<p>Для оплаты в ComePay номер счета для пополнения: {$a->transaction}</p><p>Операция создана, но не оплачена. Для завершения операции Вам необходимо произвести перечисление средств в систему <b>PayAnyWay</b> через терминалы ComePay, используя данный код:</p><p>{$a->transaction}</p><p>Сумма: {$a->amount}</p><p>Внешняя комиссия: {$a->fee}</p><p>Сумма к оплате: {$a->totalAmount}</p>';
$string['contactinvoicecreated'] = '<p>Для оплаты в системе "Contact" номер счета для пополнения: {$a->transaction}</p><p>Операция создана, но не оплачена. Для завершения операции Вам необходимо произвести перечисление средств в систему <b>МОНЕТА.РУ</b> через систему "Contact", используя вместо номера счета для пополнения данный код:</p><p>{$a->transaction}</p><p>Сумма: {$a->amount}</p><p>Внешняя комиссия: {$a->fee}</p><p>Сумма к оплате: {$a->totalAmount}</p>';
$string['elecsnetinvoicecreated'] = '<p>Contract number for Elecsnet is: {$a->transaction}</p><p>Transaction is registered. Please proceed payment with Elecsnet cash payment terminals using following <b>PayAnyWay</b> account number:</p><p>{$a->transaction}</p><p>Сумма: {$a->amount}</p><p>Внешняя комиссия: {$a->fee}</p><p>Сумма к оплате: {$a->totalAmount}</p>';
$string['eurosetinvoicecreated'] = '<p>10-значный код: {$a->transaction}</p><p>Оплата наличными через кассы салонов связи: Евросеть, Связной.<br/><a target="_blank" href="https://{$a->payment_url}/rapidareceipt.htm?operationId={$a->operation}">Распечатайте квитанцию</a> и возьмите её с собой. При оплате можете просто отдать её кассиру для того, чтобы он быстро провел Ваш платеж.</p><p>Если Вы не распечатали квитанцию, то сообщите кассиру 10-значный код. Кассир предоставит вам на проверку пречек, в котором будут указаны параметры платежа. Внимательно проверьте, что это именно ваш заказ, и подпишите пречек. Кассир возьмет деньги и выдаст вам кассовый чек, который подтверждает Вашу оплату.</p><p>В случае утраты кода, кассир восстановит его по номеру вашего мобильного телефона. Если вы распечатаете квитанцию со штрих-кодом, кассир сможет считать его ридером. При оплате через кассира следует говорить, что вы оплачиваете заказ интернет-магазина по 10-значному коду.</p><p>Сумма: {$a->amount}</p><p>Внешняя комиссия: {$a->fee}</p><p>Сумма к оплате: {$a->totalAmount}</p>';
$string['forwardinvoicecreated'] = '<p>Contract number for Forward Mobile is: {$a->transaction}</p><p>Transaction is registered. Please proceed payment with Forward Mobile system using following <b>MONETA.RU</b> account number:</p><p>{$a->transaction}</p><p>Сумма: {$a->amount}</p><p>Внешняя комиссия: {$a->fee}</p><p>Сумма к оплате: {$a->totalAmount}</p>';
$string['gorodinvoicecreated'] = '<p>Для оплаты через "Федеральную Систему ГОРОД" номер счета для пополнения: {$a->transaction}</p><p>Операция создана, но не оплачена. Для завершения операции Вам необходимо произвести перечисление средств в систему <b>PayAnyWay</b> через "Федеральную Систему ГОРОД", используя данный код:</p><p>{$a->transaction}</p><p>Сумма: {$a->amount}</p><p>Внешняя комиссия: {$a->fee}</p><p>Сумма к оплате: {$a->totalAmount}</p>';
$string['mcbinvoicecreated'] = '<p>Для оплаты через терминалы МосКредитБанка номер счета для пополнения: {$a->transaction}</p><p>Операция создана, но не оплачена. Для завершения операции Вам необходимо произвести перечисление средств в систему <b>МОНЕТА.РУ</b> через терминалы Московского Кредитного Банка, используя вместо номера счета для пополнения данный код:</p><p>{$a->transaction}</p><p>Сумма: {$a->amount}</p><p>Внешняя комиссия: {$a->fee}</p><p>Сумма к оплате: {$a->totalAmount}</p>';
$string['novoplatinvoicecreated'] = '<p>Для оплаты через NovoPlat номер счета для пополнения: {$a->transaction}</p><p>Операция создана, но не оплачена. Для завершения операции Вам необходимо произвести перечисление средств в систему <b>PayAnyWay</b> через NovoPlat, используя данный код:</p><p>{$a->transaction}</p><p>Сумма: {$a->amount}</p><p>Внешняя комиссия: {$a->fee}</p><p>Сумма к оплате: {$a->totalAmount}</p>';
$string['platikainvoicecreated'] = '<p>Для оплаты через PLATiKA номер счета для пополнения: {$a->transaction}</p><p>Операция создана, но не оплачена. Для завершения операции Вам необходимо произвести перечисление средств в систему <b>МОНЕТА.РУ</b> через систему PLATiKA, используя вместо номера счета для пополнения данный код:</p><p>{$a->transaction}</p><p>Сумма: {$a->amount}</p><p>Внешняя комиссия: {$a->fee}</p><p>Сумма к оплате: {$a->totalAmount}</p>';
