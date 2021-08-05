\connect "test";

CREATE SEQUENCE seq_test INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 12 CACHE 1;

CREATE TABLE "public"."test" (
    "id" integer DEFAULT nextval('seq_test') NOT NULL,
    "column_1" integer,
    "column_2" integer,
    "column_3" character varying(20),
    CONSTRAINT "test_pk" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "test" ("id", "column_1", "column_2", "column_3") VALUES
(10,	10,	3,	'line 10'),
(9,	9,	4,	'line 09'),
(8,	8,	5,	'line 08'),
(7,	7,	6,	'line 07'),
(5,	5,	8,	'line 05'),
(4,	4,	9,	'line 04'),
(3,	3,	10,	'line 03'),
(2,	2,	11,	'line 02'),
(1,	1,	12,	'line 01'),
(12,	12,	1,	'line 12'),
(6,	6,	7,	'line 06'),
(11,	11,	2,	'line 11');
