<?php
/*
|--------------------------------------------------------------------------
| TypeRocket Routes
|--------------------------------------------------------------------------
|
| Manage your web routes here.
|
*/


tr_route()->post('/member/login', 'login@Member');
tr_route()->post('/member/register', 'register@Member');

tr_route()->get('/member/logout', 'logout@Member');

tr_route()->get('/member/profil', 'profil@Member');

tr_route()->get('/member/paid', 'ckeckAbonnement@Member');

tr_route()->get('/member/abonnement', 'abonnement@Member');
tr_route()->post('/member/abonnement', 'abonnement@Member');


tr_route()->get('/member/abonnement/valid', 'abonnementValid@Member');
tr_route()->post('/member/abonnement/valid', 'abonnementValid@Member');



