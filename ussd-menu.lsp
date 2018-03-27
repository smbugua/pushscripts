(
 (:has-loan-on-queue)
 (:prepaid-only)
 (:menu
  ("1"  (and (= queue-count 0) (>= max-loanable 50)   (= subscriber-flags 1))  :confirm-airtime   :menu-airtime-again (session+ :amount-requested 50   :serviceq 10 :loan-service :regular :amount-net 50   :amount-gross 50   :loan-type :airtime :advance-name "50F"))
  ("2"  (and (= queue-count 0) (>= max-loanable 100)  (= subscriber-flags 1))  :confirm-airtime   :menu-airtime-again (session+ :amount-requested 100   :serviceq 15 :loan-service :regular  :amount-net 100   :amount-gross 100   :loan-type :airtime :advance-name "100F"))
  ("3"  (and (= queue-count 0) (>= max-loanable 200)  (= subscriber-flags 1))  :confirm-airtime   :menu-airtime-again (session+ :amount-requested 200   :serviceq 30 :loan-service :regular  :amount-net 200   :amount-gross 200   :loan-type :airtime :advance-name "200F"))
  ("4"  (and (= queue-count 0) (>= max-loanable 300)  (= subscriber-flags 1))  :confirm-airtime   :menu-airtime-again (session+ :amount-requested 300  :serviceq 45 :loan-service :regular :amount-net 300  :amount-gross 300  :loan-type :airtime :advance-name "300F"))
  ("5"  (and (= queue-count 0) (>= max-loanable 400)  (= subscriber-flags 1)) :confirm-airtime    :menu-airtime-again (session+ :amount-requested 400  :serviceq 60 :loan-service :regular :amount-net 400  :amount-gross 400  :loan-type :airtime :advance-name "400F" ))
  ("6"  (and (= queue-count 0) (>= max-loanable 500)  (= subscriber-flags 1)) :confirm-airtime    :menu-airtime-again (session+ :amount-requested 500  :serviceq 75 :loan-service :regular :amount-net 500  :amount-gross 500  :loan-type :airtime :advance-name "500F" ))
  ("7"  (and (= queue-count 0) (>= max-loanable 700)  (= subscriber-flags 1))  :confirm-airtime   :menu-airtime-again (session+ :amount-requested 700   :serviceq 105 :loan-service :regular      :amount-net 700   :amount-gross 700   :loan-type :airtime :advance-name "700F"))  
  ("8"  (and (= queue-count 0) (>= max-loanable 1000) (= subscriber-flags 1)) :confirm-airtime   :menu-airtime-again (session+ :amount-requested 1000  :serviceq 200 :loan-service :regular :amount-net 1000  :amount-gross 1000  :loan-type :airtime :advance-name "1000F"))
  ("9"  (and (= queue-count 0) (>= max-loanable 2000) (= subscriber-flags 1)) :confirm-airtime   :menu-airtime-again (session+ :amount-requested 2000  :serviceq 400 :loan-service :regular :amount-net 2000  :amount-gross 2000  :loan-type :airtime :advance-name "2000F"))
  ("10" nil                :show-balance)
  ("11" nil               :help)
  ("99" nil               :trigger-rec)
  (:any nil               :menu-airtime-again))

 (:menu-airtime-again
  ("1"  (and (= queue-count 0) (>= max-loanable 50)   (= subscriber-flags 1))  :confirm-airtime   :menu-airtime-again (session+ :amount-requested 50   :serviceq 10 :loan-service :regular :amount-net 50   :amount-gross 50   :loan-type :airtime :advance-name "50F"))
  ("2"  (and (= queue-count 0) (>= max-loanable 100)  (= subscriber-flags 1))  :confirm-airtime   :menu-airtime-again (session+ :amount-requested 100   :serviceq 15 :loan-service :regular  :amount-net 100   :amount-gross 100   :loan-type :airtime :advance-name "100F"))
  ("3"  (and (= queue-count 0) (>= max-loanable 200)  (= subscriber-flags 1))  :confirm-airtime   :menu-airtime-again (session+ :amount-requested 200   :serviceq 30 :loan-service :regular  :amount-net 200   :amount-gross 200   :loan-type :airtime :advance-name "200F"))
  ("4"  (and (= queue-count 0) (>= max-loanable 300)  (= subscriber-flags 1))  :confirm-airtime   :menu-airtime-again (session+ :amount-requested 300  :serviceq 45 :loan-service :regular :amount-net 300  :amount-gross 300  :loan-type :airtime :advance-name "300F"))
  ("5"  (and (= queue-count 0) (>= max-loanable 400)  (= subscriber-flags 1)) :confirm-airtime    :menu-airtime-again (session+ :amount-requested 400  :serviceq 60 :loan-service :regular :amount-net 400  :amount-gross 400  :loan-type :airtime :advance-name "400F" ))
  ("6"  (and (= queue-count 0) (>= max-loanable 500)  (= subscriber-flags 1)) :confirm-airtime    :menu-airtime-again (session+ :amount-requested 500  :serviceq 75 :loan-service :regular :amount-net 500  :amount-gross 500  :loan-type :airtime :advance-name "500F" ))
  ("7"  (and (= queue-count 0) (>= max-loanable 700)  (= subscriber-flags 1))  :confirm-airtime   :menu-airtime-again (session+ :amount-requested 700   :serviceq 105 :loan-service :regular      :amount-net 700   :amount-gross 700   :loan-type :airtime :advance-name "700F"))
  ("8"  (and (= queue-count 0) (>= max-loanable 1000) (= subscriber-flags 1)) :confirm-airtime   :menu-airtime-again (session+ :amount-requested 1000  :serviceq 200 :loan-service :regular :amount-net 1000  :amount-gross 1000  :loan-type :airtime :advance-name "1000F"))
  ("9"  (and (= queue-count 0) (>= max-loanable 2000) (= subscriber-flags 1)) :confirm-airtime   :menu-airtime-again (session+ :amount-requested 2000  :serviceq 400 :loan-service :regular :amount-net 2000  :amount-gross 2000  :loan-type :airtime :advance-name "2000F"))
  ("10" nil                :show-balance)
  ("11" nil               :help)
  ("99" nil               :trigger-rec)
  (:any nil               :menu-airtime-again))

(:confirm-airtime
  ("1"  nil :lend-airtime)
  ("2"  nil :menu)
  (:any nil :confirm-airtime-again))

(:confirm-airtime-again
  ("1"  nil :lend-airtime)
  ("2"  nil :menu)
  (:any nil :confirm-airtime-again))

 (:lend-airtime)
 (:lend-airtime-failed)
 (:trigger-rec)

(:help
  ("0"  nil :menu)
  ("1"  nil :help-1)
  ("2"  nil :help-2)
  (:any nil :help-again))

 (:help-again
  ("0"  nil :menu)
  ("1"  nil :help-1)
  ("2"  nil :help-2)
  (:any nil :help-again))
 (:help-1
  ("1"  nil :help-1-1))
 (:help-2
  ("1"  nil :help-2-1)
  ("2"  nil :help-2-2))
 (:help-1-1
  ("0"  nil :help)
  ("1"  nil :quit-help))
 (:help-2-1
  ("0"  nil :help)
  ("1"  nil :quit-help))
 (:help-2-2
  ("0"  nil :help)
  ("1"  nil :quit-help))
  )

(
 (:has-loan-on-queue
  (nil (:fr ("Desole, votre demande n a pas abouti. Veuillez reessayer plus tard.."))))
 (:prepaid-only
  (nil (:fr ("Desole, vous n etes pas autorise a utiliser ce service. Pour plus d infos contactez notre service client au 123."))))

 (:menu
 ; ((= max-qualified 0)(:fr "Cher client, MTN XTRATIME est actuellement en maintenance systeme. Veuillez reessayer apres un certain temps"))
 ((and (= max-qualified 0))(:fr "Cher client, verifiez que vous remplissez toutes les conditions pour emprunter du credit en tapant *155*7#."))
 
  ;((and (> max-qualified 0) (> loan-balance 0) (> max-loanable 49)) (:fr ("Recevez le " :current-pin "eme pret avec MTN Xtra Time")))
  ((and (> max-qualified 0) (> loan-balance 0) (> max-loanable 49)) (:fr ("Recevez un autre pret avec MTN Xtra Time")))
  ((and (> max-qualified 0) (> loan-balance 0) (< max-loanable 49)) (:fr ("Cher client, pour emprunter du credit MTN Xtra Time, vous devez avoir rembourse tous vos anciens emprunts. Tapez *155*8# pour voir vos emprunts.")))
  ((>  queue-count 0)      (:fr "Desole, votre demande n a pas abouti. Veuillez reessayer plus tard..."))
  ((and (>  max-loanable 49)   (= loan-balance 0))   (:fr "Choisissez votre montant d'emprunt:"))
  ((and (>= max-loanable 50)   (= queue-count 0))    (:fr "1 Emprunter 50F"))
  ((and (>= max-loanable 100)  (= queue-count 0))    (:fr "2 Emprunter 100F"))
  ((and (>= max-loanable 200)  (= queue-count 0))    (:fr "3 Emprunter 200F"))
  ((and (>= max-loanable 300)  (= queue-count 0))    (:fr "4 Emprunter 300F"))
  ((and (>= max-loanable 400)  (= queue-count 0))    (:fr "5 Emprunter 400F"))
  ((and (>= max-loanable 500)  (= queue-count 0))    (:fr "6 Emprunter 500F"))
  ((and (>= max-loanable 700)  (= queue-count 0))    (:fr "7 Emprunter 700F"))
  ((and (>= max-loanable 1000) (= queue-count 0))    (:fr "8 Emprunter 1000F"))
  ((and (>= max-loanable 2000) (= queue-count 0))    (:fr "9 Emprunter 2000F"))
  (nil   (:fr "10 Historique des emprunts"))
  (nil    (:fr "11 Plus d'infos"))
 ; ((or (> loan-balance 0) (= max-loanable 0))                              (:fr "99 Remboursez votre emprunt"))
  )

 (:menu-airtime-again
  (nil (:fr ("Requete invalide.")))
  ;((= max-qualified 0)(:fr "Cher client, MTN XTRATIME est actuellement en maintenance systeme. Veuillez reessayer apres un certain temps"))
   ((and (= max-qualified 0))(:fr "Cher client, verifiez que vous remplissez toutes les conditions pour emprunter du credit en tapant *155*7#."))
 ;((and (> max-qualified 0) (> loan-balance 0) (> max-loanable 49)) (:fr ("Recevez le " :current-pin "eme pret avec MTN Xtra Time")))
  ((and (> max-qualified 0) (> loan-balance 0) (> max-loanable 49)) (:fr ("Recevez un autre pret avec MTN Xtra Time")))
  ((and (> max-qualified 0) (> loan-balance 0) (< max-loanable 49))(:fr ("Cher client, pour emprunter du credit MTN Xtra Time, vous devez avoir rembourse tous vos anciens emprunts. Tapez *155*8# pour voir vos emprunts.")))
  ((>  queue-count 0)      (:fr "Desole, votre demande n a pas abouti. Veuillez reessayer plus tard...."))
  ((and (>  max-loanable 0)   (= loan-balance 0))   (:fr "Choisissez votre montant d'emprunt:"))
  ((and (>= max-loanable 50)   (= queue-count 0))    (:fr "1 Emprunter 50F"))
  ((and (>= max-loanable 100)  (= queue-count 0))    (:fr "2 Emprunter 100F"))
  ((and (>= max-loanable 200)  (= queue-count 0))    (:fr "3 Emprunter 200F"))
  ((and (>= max-loanable 300)  (= queue-count 0))    (:fr "4 Emprunter 300F"))
  ((and (>= max-loanable 400)  (= queue-count 0))    (:fr "5 Emprunter 400F"))
  ((and (>= max-loanable 500)  (= queue-count 0))    (:fr "6 Emprunter 500F"))
  ((and (>= max-loanable 700)  (= queue-count 0))    (:fr "7 Emprunter 700F"))
  ((and (>= max-loanable 1000) (= queue-count 0))    (:fr "8 Emprunter 1000F"))
  ((and (>= max-loanable 2000) (= queue-count 0))    (:fr "9 Emprunter 2000F"))
  (nil   (:fr "10 Historique des emprunts"))
  (nil    (:fr "11 Plus d'infos"))
; ((or (> loan-balance 0) (= max-loanable 0))                              (:fr "99 Remboursez votre emprunt"))
  )

(:confirm-airtime
 ((<= amount-net 500 )(:fr ("Vous avez demande un emprunt de ":amount-net " FCFA. Vous serez debite de 15% de frais supplementaires lors du remboursement.Tapez:")))
 ((> amount-net 500 )(:fr ("Vous avez demande un emprunt de ":amount-net " FCFA. Vous serez debite de 20% de frais supplementaires lors du remboursement.Tapez:")))

;  ((<= amount-net 500 )(:fr ("Vous avez demande un emprunt ":amount-net " FCFA. Frais de remboursement gratuits jusqu'au 19 Octobre. Tapez:")))
;  ((> amount-net 500 )(:fr ("Vous avez demande un emprunt ":amount-net " FCFA. Frais de remboursement gratuits jusqu'au 19 Octobre. Tapez:")))
  (nil  (:fr ("1 pour confirmer")))
  (nil  (:fr ("2 pour revenir"))))
(:confirm-airtime-again
  (nil (:fr ("Requete invalide.")))
  ((<= amount-net 500 )  (:fr ("Vous avez demande un emprunt de ":amount-net " FCFA. Vous serez debite de 15% de frais supplementaires lors du remboursement.Tapez:")))
  ((> amount-net 500 )  (:fr ("Vous avez demande un emprunt de ":amount-net " FCFA. Vous serez debite de 20% de frais supplementaires lors du remboursement.Tapez:")))

;  ((<= amount-net 500 )(:fr ("Vous avez demande un emprunt ":amount-net " FCFA. Frais de remboursement gratuits jusqu'au 19 Octobre. Tapez:")))
;  ((> amount-net 500 )(:fr ("Vous avez demande un emprunt ":amount-net " FCFA. Frais de remboursement gratuits jusqu'au 19 Octobre. Tapez:")))

  (nil  (:fr ("1 pour confirmer")))
  (nil  (:fr ("2 pour revenir"))))

 (:lend-airtime
  ((<= amount-net 500) (:fr ("Emprunt de ":amount-net " FCFA de credit effectue avec succes! Rappel: 15% de frais supplementaires lors du remboursement")))
  ((> amount-net 500) (:fr ("Emprunt de ":amount-net " FCFA de credit effectue avec succes! Rappel: 20% de frais supplementaires lors du remboursement")))

 )
 (:lend-airtime-failed
  (nil (:fr ("Desole, votre demande n a pas abouti. Veuillez reessayer plus tard.....")))
  )
  (:trigger-rec
((> loan-balance 0) (:fr "Cher client, votre demande de remboursement est en cours de traitement."))
((= loan-balance 0) (:fr "Vous n'avez pas de solde impaye."))
)
(:show-balance
  ((= loan-balance 0) (:fr ("Cher client, vous n'avez pas d'emprunt à rembourser et pouvez à tout moment demander du credit MTN Xtra Time en tapant *155#.")))
  ((> loan-balance 0) (:fr ("Cher client, vous avez ":loan-balance" F de credit a rembouser avant de pouvoir emprunter a nouveau du credit MTN Xtra Time.")))
  ((= loan-balance 0) (:fr ("0 Pour revenir au menu principal")))
  ((= loan-balance 0) (:fr ("1 Pour quitter")))
)

 (:help
  (nil (:fr ("Tapez le chiffre de votre choix:")))
  (nil (:fr ("1 Conditions pour emprunter")))
  (nil (:fr ("2 Modalites de remboursement")))
  (nil (:fr ("0 Pour revenir au menu principal")))
  )
 (:help-again
  (nil (:fr ("Requete invalide.")))
  (nil (:fr ("Tapez le chiffre de votre choix:")))
  (nil (:fr ("1 Conditions pour emprunter")))
  (nil (:fr ("2 Modalites de remboursement")))
  (nil (:fr ("0 Pour revenir au menu principal")))
  )
 (:help-1
  (nil (:fr ("- Etre un abonne prepaye")))
  (nil (:fr ("- Avoir au moins 3 mois d'anciennete sur le reseau MTN")))
  (nil (:fr ("Tapez:")))
  (nil (:fr ("1 pour voir les dernieres conditions")))
  )
 (:help-2
  (nil (:fr ("Tapez le chiffre de votre choix")))
  (nil (:fr ("1 Pour beneficier du MTN Xtra Time")))
  (nil (:fr ("2 Les frais MTN Xtra Time")))
  )
 (:help-1-1
  (nil (:fr ("Consomation moyenne mensuelle demandee pour un emprunt:")))
  (nil (:fr ("300F pour 100F")))
  (nil (:fr ("600F pour 200F")))
  (nil (:fr ("900F pour 300F")))
  (nil (:fr ("1200F pour 400F")))
  (nil (:fr ("1500F pour 500F")))
  (nil (:fr ("4000F pour 1000F")))
  (nil (:fr ("8000F pour 2000F")))
  (nil (:fr ("0 pour revenir")))
  )
(:help-2-1
  (nil (:fr ("Pour le remboursement de votre prêt, veuillez recharger votre compte principal avec un montant égal au montant emprunté + 15% de frais pour un emprunt de 100F a 500F  et + 20% pour un emprunt de 1000F et 2000F")))
  (nil (:fr ("0 pour revenir")))
  (nil (:fr ("1 pour quitter")))
  )
(:help-2-2
  (nil (:fr ("Veuillez noter que vous paierez 15% de frais supplementaires du montant emprunte si votre emprunt etait entre 100F a 500F et 20% de frais supplementaires si votre emprunt etait de plus de 500F lors de votre remboursement")))
  (nil (:fr ("0 pour revenir")))
  (nil (:fr ("1 pour quitter")))
  )
(:quit-help
  (nil (:fr ("Merci d'utiliser le service MTN Xtra Time."))))
  )
(
 ((> queue-count 0) () :has-loan-on-queue)
 ((= ussd-string "155*8") () :show-balance)
 ((and (= ussd-string "155*99") (> loan-balance 0)) () :trigger-rec)
)
