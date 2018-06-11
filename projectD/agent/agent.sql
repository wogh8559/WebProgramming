  create table agent (
  id    char(15) not null,
  pass  char(15) not null,
  name  char(10) not null,
  respname char(10) not null,
  hp    char(20)  not null,
  email char(80),
  regist_day char(20),
  primary key(id)
  );