CREATE OR REPLACE FUNCTION addclient(text,text,text,text,text,integer,text,text)
  RETURNS integer AS
'
    declare v_nom alias for $1;
    declare v_prenom alias for $2;
    declare v_email alias for $3;
    declare v_rue alias for $4;
    declare v_cp alias for $5;
    declare v_ville alias for $6;
    declare v_pays alias for $7;
    declare v_tel alias for $8;
    declare id integer;
    begin
        insert into client(nom, prenom,email, adresse, ville, cp, pays, numdetel) values (v_nom, v_prenom,v_email, v_rue, v_ville, v_cp,v_pays, v_tel);
        select into id idclient from client where nom=v_nom and prenom=v_prenom and email=v_email and adresse=v_rue and ville= v_ville and cp=v_cp and pays=v_pays and numdetel=v_tel;
	if not found then
	    id=0;
	end if;
	return id;
end;
'
LANGUAGE plpgsql 

