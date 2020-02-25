<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: Please add the following <META> element to your page <HEAD>.      -->
<!--  If necessary, please modify the charset parameter to specify the        -->
<!--  character set of your HTML page.                                        -->
<!--  ----------------------------------------------------------------------  -->

<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">

<!--  ----------------------------------------------------------------------  -->
<!--  NOTE: Please add the following <FORM> element to your page.             -->
<!--  ----------------------------------------------------------------------  -->

<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">

<input type=hidden name="oid" value="00DD0000000qee3">
<input type=hidden name="retURL" value="http://">

<!--  ####################################################################### -->
<!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
<!--  these lines if you wish to test in debug mode.                          -->
<!--  <input type="hidden" name="debug" value=1>                              -->
<!--  <input type="hidden" name="debugEmail" value="backend@magplus.com">     -->
<!--  #######################################################################   -->

<label for="first_name">First Name</label><input  id="first_name" maxlength="40" name="first_name" size="20" type="text" /><br>

<label for="last_name">Last Name</label><input  id="last_name" maxlength="80" name="last_name" size="20" type="text" /><br>

<label for="email">Email</label><input  id="email" maxlength="80" name="email" size="20" type="text" /><br>

<label for="phone">Phone</label><input  id="phone" maxlength="40" name="phone" size="20" type="text" /><br>

<label for="country">Country</label><input  id="country" maxlength="40" name="country" size="20" type="text" /><br>

<label for="company">Company</label><input  id="company" maxlength="40" name="company" size="20" type="text" /><br>

<label for="description">Description</label><textarea name="description"></textarea><br>

Correlation Data:<textarea  id="00ND00000055eoh" name="00ND00000055eoh" rows="3" type="text" wrap="soft"></textarea><br>

<label for="lead_source">Lead Source</label><select  id="lead_source" name="lead_source"><option value="">--None--</option><option value="Advertisement">Advertisement</option>
<option value="Campaigns">Campaigns</option>
<option value="Employee Referral">Employee Referral</option>
<option value="External Referral">External Referral</option>
<option value="Google AdWords">Google AdWords</option>
<option value="Organic - AOL">Organic - AOL</option>
<option value="Organic - Ask.com">Organic - Ask.com</option>
<option value="Organic - Bing">Organic - Bing</option>
<option value="Organic - Google">Organic - Google</option>
<option value="Organic - Yahoo">Organic - Yahoo</option>
<option value="Other">Other</option>
<option value="Outbound">Outbound</option>
<option value="Partner">Partner</option>
<option value="Public Relations">Public Relations</option>
<option value="Seminar - Internal">Seminar - Internal</option>
<option value="Seminar - Partner">Seminar - Partner</option>
<option value="Trade Show">Trade Show</option>
<option value="Web">Web</option>
<option value="Web Direct">Web Direct</option>
<option value="Web referral">Web referral</option>
<option value="Word of mouth">Word of mouth</option>
</select><br>

<input type="submit" name="submit">

</form>