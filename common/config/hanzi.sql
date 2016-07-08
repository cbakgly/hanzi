-- 来源：unicode，汉语大字典，台湾异体字字典，高丽异体字字典，敦煌俗字典
CREATE TABLE IF NOT EXISTS hanzi_split (
  id BIGSERIAL PRIMARY KEY,
  source smallint DEFAULT NULL, -- '来源'
  hanzi_type INT DEFAULT NULL, -- '字形类型'
  word varchar(8) DEFAULT NULL, -- '文字'
  picture varchar(32) DEFAULT NULL, -- '图片'
  nor_var_type smallint DEFAULT NULL, -- '正异类型'
  standard_word varchar(64) DEFAULT NULL, -- '所属正字'
  position_code varchar(64) DEFAULT NULL, -- '位置编号'
  radical varchar(8) DEFAULT NULL, -- '部首'
  stocks smallint DEFAULT NULL, -- '笔画'
  structure varchar(8) DEFAULT NULL, -- '结构'
  duplicate smallint DEFAULT NULL, -- '是否重复'
  corners varchar(32) DEFAULT NULL, -- '四角号码'
  attach varchar(32) DEFAULT NULL, -- '附码'
  duplicate10 varchar(128) DEFAULT NULL, -- '重复ID'
  hard10 smallint DEFAULT NULL, -- '是否难字'
  initial_split11 varchar(128) DEFAULT NULL, -- '初步拆分'
  initial_split12 varchar(128) DEFAULT NULL, -- '初步拆分'
  deform_split10 varchar(128) DEFAULT NULL, -- '调笔拆分'
  similar_stock10 varchar(128) DEFAULT NULL, -- '相似部件'
  duplicate20 varchar(128) DEFAULT NULL, -- '重复ID'
  hard20 smallint DEFAULT NULL, -- '是否难字'
  initial_split21 varchar(128) DEFAULT NULL, -- '初步拆分'
  initial_split22 varchar(128) DEFAULT NULL, -- '初步拆分'
  deform_split20 varchar(128) DEFAULT NULL, -- '调笔拆分'
  similar_stock20 varchar(128) DEFAULT NULL, -- '相似部件'
  duplicate30 varchar(128) DEFAULT NULL, -- '重复ID'
  hard30 smallint DEFAULT NULL, -- '是否难字'
  initial_split31 varchar(128) DEFAULT NULL, -- '初步拆分'
  initial_split32 varchar(128) DEFAULT NULL, -- '初步拆分'
  deform_split30 varchar(128) DEFAULT NULL, -- '调笔拆分'
  similar_stock30 varchar(128) DEFAULT NULL, -- '相似部件'
  remark varchar(128) DEFAULT NULL, -- '备注'
  created_at INT NOT NULL,
  updated_at INT NOT NULL 
);


CREATE TABLE IF NOT EXISTS hanzi_hy_yt (
  id BIGSERIAL PRIMARY KEY,
  volume varchar(8) DEFAULT NULL, -- '册' 
  page int DEFAULT NULL, -- '页' 
  num int DEFAULT NULL, -- '序号' 
  picture varchar(32) DEFAULT NULL, -- '图片'
  word1 varchar(8) DEFAULT NULL, -- '文字'  
  type1 smallint DEFAULT NULL, -- '正异类型'
  tong_word1 varchar(32) DEFAULT NULL, -- '所同正字'
  zhushi1 varchar(64) DEFAULT NULL, -- '注释信息'
  word2 varchar(8) DEFAULT NULL, -- '文字'  
  type2 smallint DEFAULT NULL, -- '正异类型'
  tong_word2 varchar(32) DEFAULT NULL, -- '所同正字'
  zhushi2 varchar(64) DEFAULT NULL, -- '注释信息'
  word3 varchar(8) DEFAULT NULL, -- '文字'  
  type3 smallint DEFAULT NULL, -- '正异类型'
  tong_word3 varchar(32) DEFAULT NULL, -- '所同正字'
  zhushi3 varchar(64) DEFAULT NULL, -- '注释信息' 
  remark varchar(128) DEFAULT NULL, -- '备注'
  created_at INT NOT NULL,
  updated_at INT NOT NULL 
);

CREATE TABLE IF NOT EXISTS hanzi_set (
  id BIGSERIAL PRIMARY KEY,
  source smallint DEFAULT NULL, -- '来源'
  type smallint DEFAULT NULL, -- '字形类型'
  word varchar(8) DEFAULT NULL, -- '文字'
  pic_name varchar(64) DEFAULT NULL, -- '图片'
  nor_var_type smallint DEFAULT NULL, -- '正异类型'
  belong_standard_word_code varchar(64) DEFAULT NULL, -- '所属正字'
  standard_word_code varchar(64) DEFAULT NULL, -- '兼正字号'
  position_code varchar(128) DEFAULT NULL, -- '位置编号'
  bDuplicate smallint DEFAULT NULL, -- '是否重复'
  duplicate_id varchar(128) DEFAULT NULL, -- '重复ID'
  frequence INT DEFAULT 0, -- '字频'
  pinyin varchar(64) DEFAULT NULL, -- '拼音'
  radical varchar(8) DEFAULT NULL, -- '部首'
  stocks smallint DEFAULT NULL, -- '笔画'
  zhengma varchar(128) DEFAULT NULL, -- '郑码'
  wubi varchar(128) DEFAULT NULL, -- '五笔'
  structure varchar(8) DEFAULT NULL, -- '结构'
  bHard smallint DEFAULT NULL, -- '是否难字'
  min_split varchar(128) DEFAULT NULL, -- '初步拆分'
  deform_split varchar(128) DEFAULT NULL, -- '调笔拆分'
  similar_stock varchar(128) DEFAULT NULL, -- '相似部件'
  max_split varchar(256) DEFAULT NULL, -- '最大拆分'
  mix_split varchar(256) DEFAULT NULL, -- '混合拆分'
  stock_serial varchar(256) DEFAULT NULL, -- '部件序列'
  remark varchar(256) DEFAULT NULL, -- '备注'
  created_at INT DEFAULT NULL,
  updated_at INT DEFAULT NULL 
);

CREATE TABLE IF NOT EXISTS hanzi_task (
  id BIGSERIAL PRIMARY KEY,
  leader_id INT NOT NULL, -- '组长'
  user_id INT NOT NULL, -- '拆字员'
  page SMALLINT DEFAULT NULL, -- '第几页'
  seq SMALLINT DEFAULT NULL, -- '第几次拆分'
  start_id INT DEFAULT NULL, -- '起始ID'
  end_id INT DEFAULT NULL, -- '结束ID'
  status SMALLINT DEFAULT NULL, -- '当前状态'
  remark VARCHAR(128) DEFAULT NULL, -- '备注'
  created_at INT NOT NULL,
  updated_at INT NOT NULL 
);

CREATE TABLE IF NOT EXISTS member_relation (
  id BIGSERIAL PRIMARY KEY,
  member_id INT NOT NULL, -- '成员ID'
  membername VARCHAR(64) DEFAULT NULL, -- '成员姓名'
  leader_id INT NOT NULL, -- '组长ID'
  leadername VARCHAR(64) DEFAULT NULL, -- '组长姓名'
  status SMALLINT DEFAULT NULL, -- '状态'
  remark VARCHAR(128) DEFAULT NULL, -- '备注'
  created_at INT NOT NULL,
  updated_at INT NOT NULL 
);

# source：1，台湾异体字；2、汉语大字典；3、高丽异体字。
CREATE TABLE IF NOT EXISTS hanzi_image (
  id BIGSERIAL PRIMARY KEY,
  source SMALLINT DEFAULT NULL, -- '来源'
  name VARCHAR(64) DEFAULT NULL, -- '图片名称'
  value TEXT NOT NULL -- '图片base64值'
);


# 用户已完成任务表。
CREATE TABLE IF NOT EXISTS hanzi_user_task (
  id BIGSERIAL PRIMARY KEY,
  userid BIGSERIAL NOT NULL, 
  taskid BIGSERIAL NOT NULL,
  task_type SMALLINT DEFAULT NULL,
  task_seq SMALLINT DEFAULT NULL,
  task_status SMALLINT DEFAULT NULL,
  quality SMALLINT DEFAULT NULL,
  remark VARCHAR(128) DEFAULT NULL, -- '备注'
  created_at INT NOT NULL,
  updated_at INT NOT NULL 
);

