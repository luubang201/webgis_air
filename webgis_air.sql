PGDMP     9    (                z         
   webgis_air    14.4    14.4     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16530 
   webgis_air    DATABASE     n   CREATE DATABASE webgis_air WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_United States.1252';
    DROP DATABASE webgis_air;
                postgres    false            �            1259    16531    tb_point    TABLE     �  CREATE TABLE public.tb_point (
    id bigint NOT NULL,
    "SHKV" character varying,
    x character varying,
    y character varying,
    epsg bigint,
    tinh character varying,
    huyen character varying,
    xa character varying,
    ten character varying,
    no2 double precision,
    co double precision,
    humidity double precision,
    o3 double precision,
    pressure double precision,
    pm10 bigint,
    pm25 bigint,
    so2 double precision,
    temperature double precision
);
    DROP TABLE public.tb_point;
       public         heap    postgres    false            �            1259    16536    tb_point_id_seq    SEQUENCE     x   CREATE SEQUENCE public.tb_point_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.tb_point_id_seq;
       public          postgres    false    209            �           0    0    tb_point_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.tb_point_id_seq OWNED BY public.tb_point.id;
          public          postgres    false    210            �            1259    16537    tb_username    TABLE     �   CREATE TABLE public.tb_username (
    id bigint NOT NULL,
    email character(20),
    password character(10),
    status character(10),
    role character(10)
);
    DROP TABLE public.tb_username;
       public         heap    postgres    false            `           2604    16542    tb_point id    DEFAULT     j   ALTER TABLE ONLY public.tb_point ALTER COLUMN id SET DEFAULT nextval('public.tb_point_id_seq'::regclass);
 :   ALTER TABLE public.tb_point ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    210    209            �          0    16531    tb_point 
   TABLE DATA           �   COPY public.tb_point (id, "SHKV", x, y, epsg, tinh, huyen, xa, ten, no2, co, humidity, o3, pressure, pm10, pm25, so2, temperature) FROM stdin;
    public          postgres    false    209   �       �          0    16537    tb_username 
   TABLE DATA           H   COPY public.tb_username (id, email, password, status, role) FROM stdin;
    public          postgres    false    211   �       �           0    0    tb_point_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.tb_point_id_seq', 59, true);
          public          postgres    false    210            b           2606    16544    tb_point tb_point_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.tb_point
    ADD CONSTRAINT tb_point_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.tb_point DROP CONSTRAINT tb_point_pkey;
       public            postgres    false    209            d           2606    16546    tb_username tb_username_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.tb_username
    ADD CONSTRAINT tb_username_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.tb_username DROP CONSTRAINT tb_username_pkey;
       public            postgres    false    211            �     x��W=k\W����<���n�& G�d1)�Z��S�
�O#ɕ&!�"+B�u�?������a��J��+�=3�93�'s���=�!��Z
�h(��c6�s2�\������������������f�f��<�]n>��}{�vu2�j��Ƴ|%����'['d�ȥ�H��R�'!s0���1|%CM��h)L�.#�JQ�v�SJwџ�nޯ�g�����筂���r�����8�L09*��j@)�� ��z��SQ
�˴����a/Q��
z���cg�� Uk`�\`%"T�6weخߞ���U�a�<߮?�v���Ii�N�����ZB�%�k%0�[	>�-��t�o6��R@~}=|���kzQ:SX	 z�2>:������~�4� �s��t��g5�V�y%�6B�r�T��`i��B{���ڰ���;؇'����0���*PM�@�Q*Ȇ��������[��
�Pc���g��Tq��D� �c�Ħ;�����0�Vݽs�{�OW��m�Usu�eā�n��
>1]���N>΀���|��l	|r�aiɏ����Ē�|3��m�])�U��AĪC��z�9����M���+$���A�L�>�vG+致��8���,�&����7s�?�X�o�åT2�{,�n,����F7!��BR)r�~���C�B:0��=h�F��`C��k߷!��5��~߾�U��ºǲ�{���6�ێxu2��r��[z� /}��=�"����t�Kʹ-���}x6��LHV
$�$V��<A�#'0%��D>�'A'i:i�w0�5��i��Ґ34�q�|�q�YgY㵔ћ�ˮ�w�hu=��0�hѻ���Xc�qѼ��rXl�~��g��^6�ª���zP@���{�WRk�U��6�N8���9�GΩ��F��S�Nѥ�R�/���r�ށ���悝���~m(��\�ikB���an�?�h�)`J<������|�S(T�t���{rfGpG��uߦ����r�y.����|ڏ��r	Q|����T�ǧ�]�_c�1��Ns���/�Q ����ϻ��<4��ILQ+�G�^)���ѥ>j�!o��τ˳������{k����ռ�Q@U��$e[�r!U�F��xtm�8d��Wp:�e�鏻a�V܆J�K�^�(�X���G>�B���J�:w8�zv��~W	$͚T���-Ŧ����r���xpmAS����~��=2v�EŇ7��j�d�Fk���Ș      �   B   x�3��)-uH�M���K��U� NC#cS3S8��L.#���ļt#C�vd}�HFp��qqq �=     