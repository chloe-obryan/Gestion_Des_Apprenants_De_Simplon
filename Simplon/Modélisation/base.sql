/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     11/03/2020 16:22:42                          */
/*==============================================================*/

/*==============================================================*/
/* Table: Apprenant                                             */
/*==============================================================*/
create table apprenant
(  
   telephoneTuteur      varchar(20) not null,
   nomApprenant         varchar(50),
   prenomApprenant      varchar(100),
   dateDeNaissance      varchar(10),
   lieuDeNaissance      varchar(100),
   genre                varchar(5),
   ville                varchar(100),
   etablissement        varchar(100),
   formation            varchar(100),
   telephoneApprenant   varchar(20),
   email                varchar(100)  not null,
   photo                varchar(255),
   primary key (email)
);

/*==============================================================*/
/* Table: Tuteur                                                */
/*==============================================================*/
create table tuteur
(  
   nomTuteur            varchar(50),
   prenomTuteur         varchar(100),
   profession           varchar(100),
   telephoneTuteur      varchar(20) not null,
   primary key (telephoneTuteur)
);

alter table Apprenant add constraint FK_association1 foreign key (telephoneTuteur)
      references Tuteur (telephoneTuteur) on delete restrict on update restrict;

