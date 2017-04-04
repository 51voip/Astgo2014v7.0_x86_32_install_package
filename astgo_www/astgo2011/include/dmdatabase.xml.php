<?php
<object class="dmdatabase" name="dmdatabase" baseclass="DataModule">
  <property name="Height">370</property>
  <property name="Name">dmdatabase</property>
  <property name="Width">597</property>
  <object class="MySQLDatabase" name="MySQLDatabase1" >
        <property name="Left">116</property>
        <property name="Top">91</property>
    <property name="DatabaseName"></property>
    <property name="Dictionary"></property>
    <property name="Host"></property>
    <property name="Name">MySQLDatabase1</property>
    <property name="UserName"></property>
    <property name="UserPassword"></property>
    <property name="OnAfterConnect">MySQLDatabase1AfterConnect</property>
  </object>
  <object class="MySQLQuery" name="MySQLQuery1" >
        <property name="Left">208</property>
        <property name="Top">89</property>
    <property name="Database">MySQLDatabase1</property>
    <property name="Name">MySQLQuery1</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
  <object class="MySQLQuery" name="MySQLQuery2" >
        <property name="Left">288</property>
        <property name="Top">81</property>
    <property name="Database">MySQLDatabase1</property>
    <property name="Name">MySQLQuery2</property>
    <property name="Params">a:0:{}</property>
    <property name="SQL">a:0:{}</property>
  </object>
</object>
?>
