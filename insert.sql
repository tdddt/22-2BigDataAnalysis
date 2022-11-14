/*patient insert*/
load data local infile 'C:\\xampp\\htdocs\\team09\\patient.csv' into table patient fields terminated by ',' lines terminated by '\n';

/*userlog insert*/
insert into userlog values (1,'Jake','jake1225','jakee1225','jake1225@gamil.com'),
    (2,'Amy','ammma','amy111','amyma111@gamil.com'),
    (3,'Lucia','luca_cia','lluucciiaa321','lluu123@gmail.com'),
    (4,'Robert','robotlover','revoltobor','robertrebor@gmail.com'),
    (5,'Joshua','shuu10','shuajo1111','joshuauu22@gmail.com'),
    (6,'Aaron','inthemountain','aaronmoun4','inthemountain@gmail.com'),
    (7,'Mary','marychrist','christ43','marymart1225@gmail.com'),
    (8,'Linda','dadas2','linlins2','dalins2@gmail.com'),
    (9,'Olivia','olive202','olivia2o2','olive2o2@gmail.com'),
    (10,'Sally','sallaa','sa54321','sally54321@gmail.com'),
    (11,'Ines','mivida','ines327','ines327@gmail.com'),
    (12,'Isabella','issac11','isabellaa415','isa_0_0@gmail.com'),
    (13,'Liam','li010203','liamail123','liamail123@gmail.com'),
    (14,'Mason','miro55','masonpw','mamamia@gmail.com'),
    (15,'Michael','angel3_3','michael44','angel3_3@gmail.com'),
    (16,'Remi','qwer1234','1234qwer','qqwweerr@gmail.com'),
    (17,'Rowan','rowwanx0x','pwpwpwpw','rowanawor17@gmail.com'),
    (18,'Kai','googling22','kai26kai','kai26@gmail.com'),
    (19,'Andrea','andrrew','notandrrew00','andrea00@gmail.com'),
    (20,'Logan','lloll_logan','lloll0ll','lloll0ll@gmal.com');

/*userinfo insert */
insert into userinfo values (5,18,'male',0,0,182.1,83,'동대문구'),
    (17,20,'female',0,0,168.5,65.2,'강서구'),
    (7,22,'female',1,0,155.4,55,'송파구'),
    (2,24,'female',0,1,172.8,72.5,'중구'),
    (10,28,'female',1,0,188.6,85.7,'은평구'),
    (14,28,'male',2,1,179.4,77.7,'노원구'),
    (3,33,'female',0,0,164.2,60.1,'서대문구'),
    (18,35,'male',99,1,162.8,60.6,'서대문구'),
    (15,38,'male',0,1,177.5,64.8,'강남구'),
    (11,39,'female',99,0,167.3,62.4,'강남구'),
    (12,41,'female',0,1,158.7,50.9,'은평구'),
    (13,44,'male',2,0,157.2,52.7,'영등포구'),
    (4,46,'male',1,1,182.4,76.3,'강동구'),
    (19,51,'female',2,0,162.5,65.1,'관악구'),
    (1,52,'male',1,1,164.3,68.7,'동작구'),
    (9,55,'female',0,1,156.4,51.6,'용산구'),
    (16,56,'male',99,0,154.8,53.2,'마포구'),
    (8,61,'female',1,0,153.9,46.6,'금천구'),
    (6,62,'male',2,1,172.5,65.1,'도봉구'),
    (20,67,'male',2,0,182.1,74.9,'구로구');

    
/*암 정보 insert*/
load data local infile 'C:\\xampp\\htdocs\\team09\\cancerinfo.csv' into table cancerinfo fields terminated by ',' lines terminated by '\n';

/*병원 정보 insert*/
local data local infile 'C:\\xampp\\htdocs\\team09\\hospitalinfo.csv' hospitalinfo fields terminated by ',' lines terminated by '\n';

/*의사 정보 insert*/
local data local infile 'C:\\xampp\\htdocs\\team09\\doctorinfo.csv' doctorinfo fields terminated by ',' lines terminated by '\n';

/*hospitalComment insert*/
insert into hospitalComment values (1,5,'이대서울병원','최고의 의료진이라고 생각합니다.'),
    (2,17,'이대목동병원','친절하게 진료봐주십니다.'), 
    (3,7,'고려대학교구로병원','한 달 전 예약 필수.'),
    (4,2,'한림대학교강남성심병원','약이 독해요.'),
    (5,10,'서울특별시보라매병원','집 앞이라 편하게 자주 갑니다.'),
    (6,14,'중앙대학교병원','다른 병원이랑 다르게 점심시간이 2시간이에요.'),
    (7,3,'가톨릭대학교 서울성모병원','친절하십니다.'),
    (8,18,'삼성서울병원','전화 진료 가능해요.'),
    (9,15,'강남세브란스병원','전화로만 예약가능합니다.'),
    (10,11,'서울아산병원','하루 전 예약문자에 답장 안 하면 예약 취소라는 점 주의해야 할 것 같아요.'),
    (11,12,'강동경희대학교의대병원','좋아요.'),
    (12,13,'강동성심병원','좋습니다.'),
    (13,4,'순천향대학교부속서울병원','이화연 선생님 추천합니다.'),
    (14,19,'한양대학교병원','원래 진료하던 사람 아니면 예약이 힘들어요.'),
    (15,1,'건국대학교병원','불친절합니다.'),
    (16,9,'연세암병원','매 진료마다 의사가 바뀌어서 불편합니다.'),
    (17,16,'서울대학교병원','여기로 옮기고 많이 호전됐어요.'),
    (18,8,'강북삼성병원','이배꽃 선생님 친절하시고 잘 봐주세요.'),
    (19,6,'국립중앙의료원','항상 진료 오래 봐주시고, 환자 한 분마다 신경써주시는 것 같아요.'),
    (20,20,'고려대학교안암병원','약값이 다른 곳에 비해 비싼 것 같습니다.'),
    (21,2,'노원을지대학교병원','건물이 넓어서 길 찾기가 복잡한데, 프론트에 문의하면 친절하게 알려주십니다'),
    (22,5,'인제대학교상계백병원','예약 안 하면 아예 진료가 불가능해요'),
    (23,8,'한국원자력의학원원자력병원','친절하신 것 같아요.');

insert into doctorComment values (1,13,4,"최고의 의료진이라고 생각합니다."),
    (2,4,5,"친절하게 진료봐주십니다."),
    (3,19,8,"한 달 전 예약 필수."),
    (4,1,10,"이 분으로 바꾸고 많이 호전됐어요."),
    (5,9,14,"집 앞이라 편하게 자주 갑니다."),
    (6,16,17,"가끔 수요일에 학회때문에 진료 안 하시는 것 같아요."),
    (7,8,20,"친절하십니다."),
    (8,6,23,"전화 진료 가능해요."),
    (9,20,26,"전화로만 예약가능합니다."),
    (10,2,30,"실력은 좋은데 까다로우신 분입니다."),
    (11,5,38,"좋아요."),
    (12,8,34,"좋습니다."),
    (13,10,40,"항상 주위에 추천하는 선생님이세요^^."),
    (14,14,44,"원래 진료하던 사람 아니면 예약이 힘들어요."),
    (15,3,48,"불친절합니다."),
    (16,18,49,"환자에게 관심이 많으신 분입니다."),
    (17,15,53,"살짝 퉁명스러우세요."),
    (18,11,55,"친절하세요."),
    (19,12,60,"항상 진료 오래 봐주시고, 환자 한 분마다 신경써주시는 것 같아요."),
    (20,5,61,"명의로 TV출현하셔야 할 것 같아요."),
    (21,17,65,"3년째 꾸준히 같은 선생님께 진료중입니다."),
    (22,7,67,"예약 안 하면 아예 진료가 불가능해요."),
    (23,2,71,"친절하신 것 같아요.");

/*암발생 시기별 상대생존율 insert*/
load data local infile 'C:\\xampp\\htdocs\\team09\\surviveAll.csv' into table surviveAll fields terminated by ',' lines terminated by '\n';

/*연령별 암 발생자수 insert*/
load data local infile 'C:\\xampp\\htdocs\\team09\\occurnumAll.csv' into table occurnumbyAll fields terminated by ',' lines terminated by '\n';

INSERT INTO 위암체크리스트(id,question)
VALUES(1,'속쓰림이 있다.'),
(2,'급격한 체중감소가 있다.'),
(3,'헛배부름, 더부룩함이 있다.'),
(4, '배꼽 주변과 상복부 복통 심화'),
(5,'잦은 배탈이 있다.'),
(6,'대변의 이상(변비, 가늘거지거나 흑변을 보는 경우)'),
(7,'연하곤란(삼키기 힘듬)'),
(8,'만성피로를 느낀다.'),
(9,'구토증세가 있다.');

INSERT INTO 간암체크리스트(id,question)
VALUES(1,'피로, 전신 쇠약감을 느낀다.'),
(2,'구역, 구토, 식욕 감퇴가 있다.'),
(3,'체중 감소가 있다.'),
(4,'우상복부가 은근히 불쾌하거나 통증이 온다.'),
(5,'공막이나 피부가 노랗게 보인다.'),
(6,'오줌색이 진해지거나 빨갛다.');

INSERT INTO 대장암체크리스트(id,question)
VALUES(1,'이유없이 늘 피곤하다.'),
(2,'체중 감소가 있다.'),
(3,'소화불량 및 구토증세가 있다.'),
(4,'변을 보기 힘들어졌다.'),
(5,'잦은 설사 혹은 변비'),
(6,'화장실을 다녀온 뒤에도 배가 불편하다.(변이 남아 있는것 같은 기분)'),
(7,'검 붉은색의 혈변이 나온다.'),
(8,'점액으로 된 변을 본다.'),
(9,'자주 복부팽만감등의 불편함을 느낀다.');

INSERT INTO 폐암체크리스트(id,question)
VALUES(1,'별다른 이유가 없는 기침과 가래가 1~2주 이상 계속된다.'),
(2,'목이 자주 쉬고, 쉽게 낫지 않는다.'),
(3,'기침할 때 종종 가래나 혈담이 섞여 나온다.'),
(4,'숨이 차고, 숨 쉴 때 ‘쌕쌕’거리는 소리가 난다.'),
(5,'두통, 흉통, 요통, 어깨 결림 증상이 심하다.'),
(6,'얼굴이나 목이 심하게 붓는다.'),
(7,'온몸의 피부색이 검게 변한다.'),
(8,'식욕이 없으며, 체중이 감소한다.'),
(9,'구역질이나 구토 증세가 잦아졌다.'),
(10,'이유 없이 갈비뼈가 부러진 적이 있다');