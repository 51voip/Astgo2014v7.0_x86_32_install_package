
// Provide a default path to dwr.engine
if (dwr == null) var dwr = {};
if (dwr.engine == null) dwr.engine = {};
if (DWREngine == null) var DWREngine = dwr.engine;

if (Pwd2 == null) var Pwd2 = {};
Pwd2._path = '/account2/dwr';
Pwd2.checkName = function(p0, callback) {
  dwr.engine._execute(Pwd2._path, 'Pwd2', 'checkName', p0, callback);
}
Pwd2.showMobile = function(callback) {
  dwr.engine._execute(Pwd2._path, 'Pwd2', 'showMobile', callback);
}
Pwd2.showEmail = function(callback) {
  dwr.engine._execute(Pwd2._path, 'Pwd2', 'showEmail', callback);
}
Pwd2.sendSmsSetPro = function(p0, callback) {
  dwr.engine._execute(Pwd2._path, 'Pwd2', 'sendSmsSetPro', p0, callback);
}
Pwd2.sendEmailSetPro = function(p0, p1, callback) {
  dwr.engine._execute(Pwd2._path, 'Pwd2', 'sendEmailSetPro', p0, p1, callback);
}
Pwd2.checkEmail = function(p0, callback) {
  dwr.engine._execute(Pwd2._path, 'Pwd2', 'checkEmail', p0, callback);
}
Pwd2.checkVaild = function(p0, callback) {
  dwr.engine._execute(Pwd2._path, 'Pwd2', 'checkVaild', p0, callback);
}
Pwd2.checkVaildGetPwd1 = function(p0, p1, callback) {
  dwr.engine._execute(Pwd2._path, 'Pwd2', 'checkVaildGetPwd1', p0, p1, callback);
}
Pwd2.checkVaildGetPwd2 = function(p0, p1, callback) {
  dwr.engine._execute(Pwd2._path, 'Pwd2', 'checkVaildGetPwd2', p0, p1, callback);
}
Pwd2.sendEmailGetPwd = function(p0, callback) {
  dwr.engine._execute(Pwd2._path, 'Pwd2', 'sendEmailGetPwd', p0, callback);
}
Pwd2.sendSmsGetPwd = function(p0, callback) {
  dwr.engine._execute(Pwd2._path, 'Pwd2', 'sendSmsGetPwd', p0, callback);
}
