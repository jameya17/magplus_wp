<?php
/*
Template NO MORE Name: Two Column Contest Special
*/
?>

<?php get_header(); ?>
  <div id="section">
    <div class="wrapper">

      <div class="two-column-page group">
        <h1 class="intro">Got an <strong>awesome</strong> tablet <strong>publishing idea?</strong></h1>
        <h2 class="intro"><strong>Build it with Mag+ and win your own iPad App!</strong></h2>
        <div class="column-one start">
        <div class="white-col">
	        <p class="white">Mag+ is the most creative and efficient way to bring your content to touchscreen tablets. Using our easy-to-learn InDesign-based production suite you can build your own visually rich, pixel-perfect issue just for the tablet. And we want to see it!</p>
	        <p class="white">Right now we're giving you a chance to show off how creative you can be with our tool. <strong>Join our creativity contest</strong> by using Mag+ to build your very own digital issue: Whether it's a collection of your favorite recipes, an annual report, a magazine, a music fesitval program, a children's book, a user manual, a digest of your blog, etc. – go ahead and create something amazing today.<strong> We'll award two winners with their own branded iPad App.</strong></p>
		</div>
		
        <h2 style="margin-top: 170px;"><strong>To join the contest, here's what you need to do:</strong></h2>
        <ul class="list simple">
          <li>Creating a Mag+ issue starts with InDesign, the most widely used platform in the publishing industry, so designers don’t have to learn any new software. Make sure you have InDesign CS4, CS5 or CS5.5 installed on your Mac or PC.</li>
          <li><a href="<?php bloginfo('url');?>/download/">Download the Mag+ production suite for free</a> and use it to build whatever you like. You'll find video tutorials and samples of great Mag+ designs <a href="http://vimeo.com/magplus">here</a> and all our user manuals <a href="<?php bloginfo('url');?>/using-magplus/manuals/">here</a>.</li>
          <li>No need to create the full issue—we just want to get a sense of the design and structure of your idea.</li>
          <li>When you're happy with your production - the Mag+ production suit will let you create a MIB. All entries to our creativity contest have to be designed as functioning MIB’s – see what a MIB is <a title="What is is a MIB file?" href="http://www.magplus.com/mib.html" rel="shadowbox;height=220;width=640">here</a>.</li>
          <li>When you're done, submit the final issue file (the exported .mib file), along with your name and email, using the submission form below.</li>
          <li>Read the official contest rules <a href="<?php bloginfo('url');?>/contest-official-rules">here</a></li>
        </ul>
        </div>
        <div class="column-two start">
        <p class="blue-banner start"><span>Win your own iPad App!</span><img src="<?php bloginfo('template_url'); ?>/images/ipads-ad-01.png" alt="Ipads Bundled" /></p>


        <div class="formthingy join-contest">
          <script src="http://49video.resources.s3.amazonaws.com/uploadthingy.js" type="text/javascript" language="Javascript"></script>
          <iframe id="uploadtarget" name="uploadtarget" src="" style="width:0px;height:0px;border:0"></iframe>
          <h3>When you’re ready - submit your entry here</h3>
          <div id='uploadarea'><p><img src=http://49video.resources.s3.amazonaws.com/loading.gif width=16 height=16>  <a href=http://www.uploadthingy.com>Loading uploadthingy: The file upload form widget for graphics, photos, video and other large files the lives on your web site ...</a> <br><br>If your upload form doesn't display within a few seconds, please check the <a href=http://www.uploadthingy.com/faq.html>FAQ</a> or contact us at hello@uploadthingy.com. We'd love to help out!</p></div>
          <script type="text/javascript" language="Javascript">
          var sitecode="bWFncGx1cy5jb20=";
          authupload();
          function getUploadForm(json) {
          showblinks=false;
          var h="";
          h+="<p>Your name *";
          h+="<input type=text id='uploader_name' name='uploader_name'></p>";
          h+="<p>E-mail *";
          h+="<input type=text id='uploader_company' name='uploader_company'></p>";
          h+="<p>Country *";
          h+="<input type=text id='uploader_contact' name='uploader_contact'></p>";
          h+="<p>Write a few lines about your idea *";
          h+="<textarea id='uploader_description' name='uploader_description'></textarea></p>";
          h+="<p>Your MIB-file";
          h+="<input type='file' size='20' id='uploadfile0' name='file0'><br>";
          h+="</p>";
          h+="<input type='hidden' id='authcode' name='authcode' value='"+json.c+"'>";
          h+="<input type='hidden' id='uploadid' name='id' value='widget$"+json.d+"$"+json.c.substring(0,json.c.indexOf("_"))+"'>";
          h+="<input type='hidden' id='callbackurl' name='callbackurl' value='"+baseserverurl+"'>";
          h+="<input type='hidden' name='savemeta' value='yes'>";
          h+="<p><input class='submit button' id='49widget_submitbutton' type='button' onclick='doUpload();' name='suploadvideo' value='Submit your entry'></p>";
          return h;
          }
          function doUpload() { if (checkform()) { upload('start'); } }
          function checkform() { 
          var found=false;
          var cnt=0;
          while (document.getElementById('uploadfile'+cnt)) {
          if (document.getElementById('uploadfile'+cnt).value.length>0) {
          found=true;
          break;
          }
          cnt++;
          }
          if (!found) {
          alert('Please select at least one file to upload.');
          return false;
          }
          if (document.getElementById('uploader_name').value.length==0) {
          alert('Please fill out the field: Your name.');
          return false;
          }
          if (document.getElementById('uploader_company').value.length==0) {
          alert('Please fill out the field: E-mail.');
          return false;
          }
          if (document.getElementById('uploader_contact').value.length==0) {
          alert('Please fill out the field: Country.');
          return false;
          }
          if (document.getElementById('uploader_description').value.length==0) {
          alert('Please fill out the field: Write a few lines about your idea.');
          return false;
          }
          uploadmetadata=new Array();
          uploadmetadata['name']=document.getElementById('uploader_name').value;
          uploadmetadata['company']=document.getElementById('uploader_company').value;
          uploadmetadata['contact']=document.getElementById('uploader_contact').value;
          uploadmetadata['description']=document.getElementById('uploader_description').value;
          uploadmetadata['uploadfile0']=document.getElementById('uploadfile0').value;
            return true;
          }
          </script>
          <p class="small">By clicking the submit button, I confirm that I have read and understand the <a href="<?php bloginfo('url');?>/contest-official-rules">official rules for the contest</a>.</p>
        </div>

        </div>
        <div class="clearall"></div>
        <div class="column-one start">
          <div class="contest-period box orange">
          <h3>Contest period - 11 Oct - 16 Dec, 2011</h3>
          <ul class="list dates large">
            <li>
              <em>Submissions officially close at <strong>9pm EST Nov 28, 2011</strong>.</em>
            </li>
            <li>
              <div class="date"><strong>7 Dec</strong></div>
              <div>Jury announces the three finalists and a public voting process starts.</div>
            </li>
            <li>
              <div class="date"><strong>16 Dec</strong></div>
              <div>At 3pm EST, the idea with the most public votes will be the winner.<br/>At the same time, we'll announce the Jury Winner as well.</div>
            </li>
          </ul>
          </div>
        </div>
        <div class="column-two start">
          <div class="judging box gray">
            <h3 id="judging-and-prices"><strong>Judging and Prizes:</strong></h3>
            <ul class="list simple">
              <li>Judging will be based on execution and the creativity displayed in the use of the platform and in thinking about tablet publications.</li>
              <li>On December 7, 2011, our jury will choose three finalists.</li>
              <li><strong>There are two ways you can win your own reader app:</strong></li>
              <li><strong>1.</strong>The three finalists chosen by the jury will be presented on the Mag+ <a href="<?php bloginfo('url');?>/finalists">finalist page</a> as videos running in an iPad simulator (video created by Mag+). On December 16, the idea with the most ”Votes” will be named the winner.</li>
              <li><strong>2.</strong> Also on December 16, the jury will pick its own winner out of the three finalists. (The jury may pick the same winner as the audience does.)</li>
            </ul>
            <p class="large-btn blue"><a style="margin-right: 10px;" href="<?php bloginfo('url');?>/jury-and-prices">Meet the Jury</a> <a href="<?php bloginfo('url');?>/contest-official-rules">Contest Rules</a></p>
          </div>
        </div>

        <?php #get_template_part( 'loop', 'page' ); ?>
      </div>

    </div>
  </div> <!-- Closes #section -->
<?php get_footer(); ?>
