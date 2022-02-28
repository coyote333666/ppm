\connect "test";

CREATE SEQUENCE seq_portlet INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 12 CACHE 1;

CREATE TABLE "public"."portlet" (
    "id" integer DEFAULT nextval('seq_portlet') NOT NULL
    ,"header" text
    ,"portlet_name" text
    , CONSTRAINT "portlet_pk" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "portlet" ("header", "portlet_name") VALUES
('portlet_01',	'Window title of portlet_01');
