create database hetraonline; --u_stageHO/Stag2024

create sequence seq_utilisateur start with 1 increment by 1;
create table utilisateur(
    id number primary key,
    identifiant varchar(50),
    password varchar(255)
);
insert into utilisateur(id,identifiant,password)values(seq_utilisateur.nextval,'jean@gmail.com','jean1234');
create table etat_de_payement(
    id number primary key,
    etat varchar(50)
);
create sequence seq_etat_payement start with 1 increment by 1;
create table mode_de_payement(
    id number primary key,
    payement varchar(50)
);
create sequence seq_mode_payement start with 1 increment by 1;
create table type_de_taxe(
    id number primary key,
    taxe varchar(50)
);
create sequence seq_type_taxe start with 1 increment by 1;
create table contribuable(
    id number primary key,
    nom varchar(50),
    prenom varchar(50),
    nif number(25) unique,
    societe varchar(50),
    email varchar(50),
    adresse varchar(50)
);
create sequence seq_contribuable start with 1 increment by 1;
create table declaration(
    id number primary key,
    idcontribuable int references contribuable(id),
    idtype_taxe  int references type_de_taxe(id),
    montant binary_double,
    datedeclaration date
);
create sequence seq_etat_validation start with 1 increment by 1;
create table etat_validation(
    id number primary key,
   etat varchar(50)
);
create sequence seq_declaration start with 1 increment by 1 nocache nocycle;
create table detail_declaration(
    id number primary key,
    iddeclaration int references declaration(id),
    montant_a_recouvrire number(38,2),
    datedebut date,
    datefin date,
    montant_payer number(38,2),
    idetatpayement int references etat_de_payement(id),
    idmodepayement int references mode_de_payement(id),
    idetatvalidation int references etat_validation(id)
);
create sequence seq_detail_declaration start with 1 increment  by 1 nocache nocycle;
create sequence seq_virement start with 1 increment  by 1 nocache nocycle;
create table virement(
    id number primary key,
    codebanque varchar(50),
    codeagence varchar(50),
    numerodecompte varchar(50),
    clerib varchar(50)
);
create sequence seq_detail_payement start with 1 increment  by 1 nocache nocycle;
create table detail_payement(
    id number primary key,
    fourniseur varchar(50),
    codefourniseur varchar(50),
    numerocontribuable varchar(50),
    cle varchar(50),
    idcontribuable number references contribuable(ID)
);
create sequence seq_virement_file start with 1 increment  by 1 nocache nocycle;
create table virement_file(
    id number primary key,
    pathfile varchar(255)
);
create sequence seq_payement_declaration start with 1 increment by 1 nocache nocycle;
create table payement_detail_declaration(
    id number primary key,
    montant_payement number(38,2),
    reste_payement number(38,2),
    montant_a_payement number(38,2),
    datepayement date,
    iddetaildeclaration int references detail_declaration(id)
);
create sequence seq_mobile_banking start with 1 increment by 1 nocache nocycle;
create table mobilebanking(
    id number primary key,
    operateur varchar(50),
    references varchar(50)
);
create table teste( idcontribuable int references contribuable(id));

insert into etat_de_payement(id,etat) values(seq_etat_payement.nextval,'non payer');
insert into etat_de_payement(id,etat) values(seq_etat_payement.nextval,'payer');
insert into etat_de_payement(id,etat) values(seq_etat_payement.nextval,'a payer');
insert into mode_de_payement(id,payement)values(seq_mode_payement.nextval,'mobile banking');
insert into mode_de_payement(id,payement)values(seq_mode_payement.nextval,'virement bancaire');
insert into type_de_taxe(id,taxe)values(seq_type_taxe.nextval,'TVA');
insert into type_de_taxe(id,taxe)values(seq_type_taxe.nextval,'IRSA');
insert into type_de_taxe(id,taxe)values(seq_type_taxe.nextval,'IR');
insert into type_de_taxe(id,taxe)values(seq_type_taxe.nextval,'IS');

insert into contribuable (id,nom,prenom,nif,societe)values(seq_contribuable.nextval,'tahina','chan kan akjea',1254786767,'Chomeur');

create view v_declaration_contribuable as
select contribuable.*,declaration.montant,declaration.datedeclaration from contribuable join declaration on contribuable.id = declaration.idcontribuable;
insert into declaration(id,idcontribuable,montant,datedeclaration)values(seq_declaration.nextval,2,234500.00,to_date('2004-12-30','YYYY-MM-DD'));
alter table declaration alter column montant number(10,2);
create table test(nombre number(10,2));
insert into test (nombre) values(3897.13);
 create or replace view v_detail_declaration as
 select contribuable.*,declaration.datedeclaration,declaration.idcontribuable,type_de_taxe.taxe,detail_declaration.datedebut,detail_declaration.datefin,detail_declaration.montant_a_recouvrire,etat_de_payement.etat,declaration.id as iddeclaration
 from declaration join contribuable on declaration.idcontribuable=contribuable.id
 join detail_declaration on detail_declaration.iddeclaration=declaration.id
 join etat_de_payement on etat_de_payement.id=detail_declaration.idetatpayement
 join type_de_taxe on type_de_taxe.id=declaration.idtype_taxe;

 create or replace view v_detail_valider as
 select contribuable.nom,contribuable.prenom,contribuable.societe,type_de_taxe.taxe,detail_declaration.datedebut,detail_declaration.datefin,detail_declaration.montant_payer,detail_payement.*,declaration.id as iddeclaration,etat_de_payement.etat as etatpayement,etat_validation.etat as etatvalidation,contribuable.nif from detail_declaration
 join declaration on declaration.id=detail_declaration.iddeclaration
 join contribuable on contribuable.id=declaration.idcontribuable
 join detail_payement on detail_payement.idcontribuable=contribuable.id
 join type_de_taxe on type_de_taxe.id=declaration.idtype_taxe
 join etat_de_payement on etat_de_payement.id=detail_declaration.idetatpayement
 join etat_validation on etat_validation.id=detail_declaration.idetatvalidation;

insert into etat_validation(id,etat)values(seq_etat_validation.nextval,'non valider');
insert into etat_validation(id,etat)values(seq_etat_validation.nextval,'a valider');
insert into etat_validation(id,etat)values(seq_etat_validation.nextval,'valider');

select * from utilisateur where identifiant='jean@gmail.com' and password='jean1234';

create or replace view v_charge_fiscal as
select payement_detail_declaration.*,detail_declaration.datedebut,detail_declaration.datefin,etat_de_payement.etat,mode_de_payement.payement,etat_validation.etat_validation,declaration.id as iddeclaration from payement_detail_declaration
join detail_declaration on payement_detail_declaration.iddetaildeclaration = detail_declaration.id
join etat_de_payement on etat_de_payement.id=detail_declaration.idetatpayement
join etat_validation on etat_validation.id = detail_declaration.idetatvalidation
join declaration on declaration.id = detail_declaration.iddeclaration
join mode_de_payement on mode_de_payement.id = detail_declaration.idmodepayement;
