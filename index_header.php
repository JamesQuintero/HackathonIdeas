<div style="width:100%;background:url('./images/backgrounds/footer_lodyas.png');"">
   <div style="width:1000px;margin:0 auto;">
      <div>
         <table style="width:100%;padding-top:10px;">
            <tbody>
               <tr>
                  <td>
                     <a href="index.php" style="text-decoration:none;"><p style="font-size:30px;color:rgb(220,220,200);">Hackathon Project Ideas</p></a> 
                  </td>
                  <td style="text-align:right;">
                     <span style="color:rgb(200,200,200);"><?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?></span>
                     <a href="./logout.php"><input type="button" class="button" value="Logout" /></a>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
      <div id="header">
         <div id="header_body">
            <table style="width:100%;height:100%;">
               <tbody>
                     <tr>
                        <td style="display:table-cell;">
                              <table id="header_table" style="float:right;">
                                 <tbody>
                                    <tr>
                                          <td class="left_header_button header_button" style="width:33%">
                                             <a href="./ideas.php" class="header_link">
                                                <table style="margin:0 auto;height:100%">
                                                      <tbody>
                                                         <tr>
                                                            <td>
                                                                  <img class="icon" src="./images/list.png" style="height:60px;"/>
                                                            </td>
                                                            <td>
                                                                  <p class="header_button_text">List of ideas</p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                </table>
                                             </a>
                                          </td>
      <!--                                     <td class="header_button" onClick="window.location.replace('http://smartsoftware.technology/algo');" >
                                             <table style="margin:0 auto;">
                                                <tbody>
                                                      <tr>
                                                         <td>
                                                            <img class="icon" src="http://smartsoftware.technology/images/AI_poker.png" />
                                                         </td>
                                                         <td>
                                                            <p class="header_button_text">AI Poker</p>
                                                         </td>
                                                      </tr>
                                                </tbody>
                                             </table>
                                          </td>-->
                                          <?php if(!isset($_SESSION['id'])) echo "<!--";?>
                                          <td class="middle_header_button header_button" style="width:33%">
                                             <a href="./suggest_ideas.php"  class="header_link">
                                                   <table style="margin:0 auto;height:100%;">
                                                      <tbody>
                                                         <tr>
                                                            <td>
                                                                  <img class="icon" src="./images/suggest.png" style="height:70px;"/>
                                                            </td>
                                                            <td>
                                                                  <p class="header_button_text">Suggest idea</p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                </table>
                                             </a>
                                          </td>
                                          <td class="right_header_button header_button" style="width:33%">
                                             <a href="./my_ideas.php"  class="header_link">
                                                   <table style="margin:0 auto;height:100%;">
                                                      <tbody>
                                                         <tr>
                                                            <td>
                                                                  <img class="icon" src="./images/my_ideas.png" style="height:60px;"/>
                                                            </td>
                                                            <td>
                                                                  <p class="header_button_text">My Ideas</p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                </table>
                                             </a>
                                          </td>
                                          <?php if(!isset($_SESSION['id'])) echo "-->"; ?>
      <!--                                     <td class="right_header_button" onClick="display_login();" >
                                             <table style="margin:0 auto;">
                                                <tbody>
                                                      <tr>
                                                         <td>
                                                            <p class="header_button_text">Register</p>
                                                         </td>
                                                      </tr>
                                                </tbody>
                                             </table>
                                          </td>-->
                                    </tr>
                                 </tbody>
                              </table>
                        </td>
                     </tr>
               </tbody>
            </table>
         </div>
      </div>
      </div>
</div>