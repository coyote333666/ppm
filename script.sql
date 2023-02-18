\connect "test";

CREATE SEQUENCE seq_test INCREMENT 1 MINVALUE 1 MAXVALUE 9223372036854775807 START 12 CACHE 1;

CREATE TABLE "public"."test" (
    "id" integer DEFAULT nextval('seq_test') NOT NULL,
    "column_1" integer,
    "column_2" integer,
    "column_3" character varying(200),
    CONSTRAINT "test_pk" PRIMARY KEY ("id")
) WITH (oids = false);

INSERT INTO "test" ("id", "column_1", "column_2", "column_3") VALUES
(10,	10,	3,	'test line 10 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(9,	9,	4,	'test line 09 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(8,	8,	5,	'test line 08 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(7,	7,	6,	'test line 07 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(5,	5,	8,	'test line 05 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(4,	4,	9,	'test line 04 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(3,	3,	10,	'test line 03 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(2,	2,	11,	'test line 02 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(1,	1,	12,	'test line 01 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(12,	12,	1,	'test line 12 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(6,	6,	7,	'test line 06 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. '),
(11,	11,	2,	'test line 11 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ');
