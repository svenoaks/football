<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        section {
            display: inline-block;
        }
        form {
            border: 5px solid #333;
            margin-bottom:20px;
        }
        div {
            margin:5px;
        }
        input, button {
            height:30px;
            width:200px;
        }
        label {
            vertical-align:top;
        }
        textarea {
            width:500px;
            font-size:1.0em;
        }
        .m-form-div {
            margin-bottom:20px;
        }

    </style>
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/admin-submit.js"></script>
</head>
<body>
<form id="form-variables">
    <div class="m-form-div">
        <h4 class="">Enter your administrator credentials:</h4>


        <div class="form-group">
            <label for="user_name">Username</label>
            <input type="text" name="user_name" value="" class="form-control" id="user_name" placeholder="username"
                   required>
        </div>
        <div class="form-group">
            <label for="user_password">Password</label>
            <input type="password" name="user_password" value="" class="form-control" id="user_password"
                   placeholder="password"
                   required>
        </div>
    </div>
    <div>
        <label>Current Week for Site</label>
        <select name="week">
            <?php
            define ('MAX_WEEKS', 12);
            $selected = ' selected=\"selected\"';
            for ($i = 1; $i <= MAX_WEEKS; ++$i) {
                if ($i == $week)
                    $piece = $selected;
                else
                    $piece = "";
                echo "<option value=\"$i\"$piece>$i</option>";
            }
            ?>
            </select>
    </div>
    <div>
        <label>Display the Scorecard</label>
        <select name="scorecard">
            <?php
            if ($scorecardEnabled) {
                echo "<option value=\"true\"$selected>true</option>";
                echo "<option value=\"false\">false</option>";
            } else {
                echo "<option value=\"true\">true</option>";
                echo "<option value=\"false\"$selected>false</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <label>News Section 1</label>
        <textarea name="news1" rows="15"><?=$news1?></textarea>
    </div>
    <div>
        <label>News Section 2</label>
        <textarea name="news2" rows="15"><?=$news2?></textarea>
    </div>
    <div>
        <label>News Section 3</label>
        <textarea name="news3" rows="15"><?=$news3?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Form</button>
    <h3 id="status">Status: </h3>
</form>
<form id="m-form">
<div class="m-form-div">
    <h4 class="">Enter your administrator credentials:</h4>


    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" name="user_name" value="" class="form-control" id="user_name" placeholder="username"
               required>
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" value="" class="form-control" id="user_password"
               placeholder="password"
               required>
    </div>
</div>

<div><label>Select Week</label>
    <select name="week">
        <?php
        define ('MAX_WEEKS', 12);
        $selected = ' selected=\"selected\"';
        for ($i = 1; $i <= MAX_WEEKS; ++$i) {
            if ($i == $week)
                $piece = $selected;
            else
                $piece = "";
            echo "<option value=\"$i\"$piece>$i</option>";
        }
        ?>
    </select>
</div>
<section>
<h3>Select PlayingA Team</h3>

<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_1580721518">
                <div class="ss-q-title">American
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the
                    American Athletic Conference
                </div>
            </label>
            <select name="Aoption_american" id="entry_1580721518"
                >
                <option value=""></option>
                <option value="Central Florida (UCF)">Central Florida (UCF)</option>
                <option value="Cincinnati">Cincinnati</option>
                <option value="Connecticut (UConn)">Connecticut (UConn)</option>
                <option value="East Carolina (ECU)">East Carolina (ECU)</option>
                <option value="Houston">Houston</option>
                <option value="Memphis">Memphis</option>
                <option value="South Florida (USF)">South Florida (USF)</option>
                <option value="Southern Methodist (SMU)">Southern Methodist (SMU)</option>
                <option value="Temple">Temple</option>
                <option value="Tulane">Tulane</option>
                <option value="Tulsa">Tulsa</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_628928305">
                <div class="ss-q-title">ACC
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the
                    Atlantic Coast Conference
                </div>
            </label>
            <select name="Aoption_acc" id="entry_628928305"
                    aria-label="ACC Select your team from the Atlantic Coast Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Boston College (BC)">Boston College (BC)</option>
                <option value="Clemson">Clemson</option>
                <option value="Duke">Duke</option>
                <option value="Florida State (FSU)">Florida State (FSU)</option>
                <option value="Georgia Tech">Georgia Tech</option>
                <option value="Louisville">Louisville</option>
                <option value="Miami">Miami</option>
                <option value="North Carolina (UNC)">North Carolina (UNC)</option>
                <option value="North Carolina State (NC State)">North Carolina State (NC State)
                </option>
                <option value="Pittsburgh (Pitt)">Pittsburgh (Pitt)</option>
                <option value="Syracuse">Syracuse</option>
                <option value="Virginia">Virginia</option>
                <option value="Virginia Tech (VT)">Virginia Tech (VT)</option>
                <option value="Wake Forest">Wake Forest</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_51962862">
                <div class="ss-q-title">Big Ten (B1G)
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the Big Ten
                    Conference
                </div>
            </label>
            <select name="Aoption_big10" id="entry_51962862"
                    aria-label="Big Ten (B1G) Select your team from the Big Ten Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Illinois">Illinois</option>
                <option value="Indiana">Indiana</option>
                <option value="Iowa">Iowa</option>
                <option value="Maryland">Maryland</option>
                <option value="Michigan">Michigan</option>
                <option value="Michigan State">Michigan State</option>
                <option value="Minnesota">Minnesota</option>
                <option value="Nebraska">Nebraska</option>
                <option value="Northwestern">Northwestern</option>
                <option value="Ohio State">Ohio State</option>
                <option value="Penn State">Penn State</option>
                <option value="Purdue">Purdue</option>
                <option value="Rutgers">Rutgers</option>
                <option value="Wisconsin">Wisconsin</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_151213574">
                <div class="ss-q-title">Big 12
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the Big 12
                    Conference
                </div>
            </label>
            <select name="Aoption_big12" id="entry_151213574"
                    aria-label="Big 12 Select your team from the Big 12 Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Baylor">Baylor</option>
                <option value="Iowa State">Iowa State</option>
                <option value="Kansas">Kansas</option>
                <option value="Kansas State (K-State)">Kansas State (K-State)</option>
                <option value="Oklahoma">Oklahoma</option>
                <option value="Oklahoma State">Oklahoma State</option>
                <option value="Texas">Texas</option>
                <option value="Texas Christian (TCU)">Texas Christian (TCU)</option>
                <option value="Texas Tech">Texas Tech</option>
                <option value="West Virginia (WVU)">West Virginia (WVU)</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_1832398034">
                <div class="ss-q-title">Pacific-12 (PAC-12)
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the
                    Pacific-12 Conference
                </div>
            </label>
            <select name="Aoption_pacific12" id="entry_1832398034"
                    aria-label="Pacific-12 (PAC-12) Select your team from the Pacific-12 Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Arizona">Arizona</option>
                <option value="Arizona State (ASU)">Arizona State (ASU)</option>
                <option value="California (Cal)">California (Cal)</option>
                <option value="Colorado">Colorado</option>
                <option value="Oregon">Oregon</option>
                <option value="Oregon State">Oregon State</option>
                <option value="Southern California (USC)">Southern California (USC)</option>
                <option value="Stanford">Stanford</option>
                <option value="UCLA">UCLA</option>
                <option value="Utah">Utah</option>
                <option value="Washington">Washington</option>
                <option value="Washington State">Washington State</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_1225990882">
                <div class="ss-q-title">Southeastern (SEC)
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the
                    Southeastern Conference
                </div>
            </label>
            <select name="Aoption_southeastern" id="entry_1225990882"
                    aria-label="Southeastern (SEC) Select your team from the Southeastern Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Alabama">Alabama</option>
                <option value="Arkansas">Arkansas</option>
                <option value="Auburn">Auburn</option>
                <option value="Florida (UF)">Florida (UF)</option>
                <option value="Georgia">Georgia</option>
                <option value="Kentucky">Kentucky</option>
                <option value="Louisiana State (LSU)">Louisiana State (LSU)</option>
                <option value="Mississippi (Ole Miss)">Mississippi (Ole Miss)</option>
                <option value="Mississippi State">Mississippi State</option>
                <option value="Missouri">Missouri</option>
                <option value="South Carolina">South Carolina</option>
                <option value="Tennessee">Tennessee</option>
                <option value="Texas A&amp;M">Texas A&amp;M</option>
                <option value="Vanderbilt">Vanderbilt</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_675408933">
                <div class="ss-q-title">Non-AQ
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from any Non-AQ
                    Division I FBS Schools
                </div>
            </label>
            <select name="Aoption_nonaq" id="entry_675408933"
                    aria-label="Non-AQ Select your team from any Non-AQ Division I FBS Schools "
                    aria-required="true">
                <option value=""></option>
                <option value="Air Force">Air Force</option>
                <option value="Akron">Akron</option>
                <option value="Appalachian State">Appalachian State</option>
                <option value="Arkansas State">Arkansas State</option>
                <option value="Army">Army</option>
                <option value="Ball State">Ball State</option>
                <option value="Boise State">Boise State</option>
                <option value="Bowling Green">Bowling Green</option>
                <option value="Brigham Young (BYU)">Brigham Young (BYU)</option>
                <option value="Buffalo">Buffalo</option>
                <option value="Central Michigan">Central Michigan</option>
                <option value="Colorado State">Colorado State</option>
                <option value="Eastern Michigan">Eastern Michigan</option>
                <option value="Florida Atlantic (FAU)">Florida Atlantic (FAU)</option>
                <option value="Florida International (FIU)">Florida International (FIU)</option>
                <option value="Fresno State">Fresno State</option>
                <option value="Georgia Southern">Georgia Southern</option>
                <option value="Georgia State">Georgia State</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Idaho">Idaho</option>
                <option value="Kent State">Kent State</option>
                <option value="Louisiana Tech (LA Tech)">Louisiana Tech (LA Tech)</option>
                <option value="Marshall">Marshall</option>
                <option value="Miami (Ohio)">Miami (Ohio)</option>
                <option value="Middle Tennessee">Middle Tennessee</option>
                <option value="Navy">Navy</option>
                <option value="Nevada">Nevada</option>
                <option value="New Mexico">New Mexico</option>
                <option value="New Mexico State">New Mexico State</option>
                <option value="Northern Illinois (NIU)">Northern Illinois (NIU)</option>
                <option value="North Texas">North Texas</option>
                <option value="Notre Dame">Notre Dame</option>
                <option value="Ohio">Ohio</option>
                <option value="Old Dominion">Old Dominion</option>
                <option value="Rice">Rice</option>
                <option value="San Diego State">San Diego State</option>
                <option value="San Jose State">San Jose State</option>
                <option value="South Alabama">South Alabama</option>
                <option value="Southern Miss">Southern Miss</option>
                <option value="Texas State">Texas State</option>
                <option value="Toledo">Toledo</option>
                <option value="Troy">Troy</option>
                <option value="UAB (Alabama - Birmingham)">UAB (Alabama - Birmingham)</option>
                <option value="ULL (Louisiana - Lafayette)">ULL (Louisiana - Lafayette)</option>
                <option value="ULM (Louisiana - Monroe)">ULM (Louisiana - Monroe)</option>
                <option value="UMass (Massachusetts)">UMass (Massachusetts)</option>
                <option value="UNLV (Nevada - Las Vegas)">UNLV (Nevada - Las Vegas)</option>
                <option value="Utah State">Utah State</option>
                <option value="UTEP (Texas - El Paso)">UTEP (Texas - El Paso)</option>
                <option value="UTSA (Texas - San Antonio)">UTSA (Texas - San Antonio)</option>
                <option value="Western Michigan">Western Michigan</option>
                <option value="WKU (Western Kentucky)">WKU (Western Kentucky)</option>
                <option value="Wyoming">Wyoming</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>


<div class="ss-item ss-navigate">
    <table id="navigation-table">
        <tbody>
        <tr>
            <td class="ss-form-entry goog-inline-block" id="navigation-buttons" dir="ltr">


            </td>
        </tr>
        </tbody>
    </table>
</div>
</section>
<section>
<h3>Select PlayingB Team</h3>

<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_1580721518">
                <div class="ss-q-title">American
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the
                    American Athletic Conference
                </div>
            </label>
            <select name="Boption_american" id="entry_1580721518"
                    aria-label="American Select your team from the American Athletic Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Central Florida (UCF)">Central Florida (UCF)</option>
                <option value="Cincinnati">Cincinnati</option>
                <option value="Connecticut (UConn)">Connecticut (UConn)</option>
                <option value="East Carolina (ECU)">East Carolina (ECU)</option>
                <option value="Houston">Houston</option>
                <option value="Memphis">Memphis</option>
                <option value="South Florida (USF)">South Florida (USF)</option>
                <option value="Southern Methodist (SMU)">Southern Methodist (SMU)</option>
                <option value="Temple">Temple</option>
                <option value="Tulane">Tulane</option>
                <option value="Tulsa">Tulsa</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_628928305">
                <div class="ss-q-title">ACC
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the
                    Atlantic Coast Conference
                </div>
            </label>
            <select name="Boption_acc" id="entry_628928305"
                    aria-label="ACC Select your team from the Atlantic Coast Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Boston College (BC)">Boston College (BC)</option>
                <option value="Clemson">Clemson</option>
                <option value="Duke">Duke</option>
                <option value="Florida State (FSU)">Florida State (FSU)</option>
                <option value="Georgia Tech">Georgia Tech</option>
                <option value="Louisville">Louisville</option>
                <option value="Miami">Miami</option>
                <option value="North Carolina (UNC)">North Carolina (UNC)</option>
                <option value="North Carolina State (NC State)">North Carolina State (NC State)
                </option>
                <option value="Pittsburgh (Pitt)">Pittsburgh (Pitt)</option>
                <option value="Syracuse">Syracuse</option>
                <option value="Virginia">Virginia</option>
                <option value="Virginia Tech (VT)">Virginia Tech (VT)</option>
                <option value="Wake Forest">Wake Forest</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_51962862">
                <div class="ss-q-title">Big Ten (B1G)
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the Big Ten
                    Conference
                </div>
            </label>
            <select name="Boption_big10" id="entry_51962862"
                    aria-label="Big Ten (B1G) Select your team from the Big Ten Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Illinois">Illinois</option>
                <option value="Indiana">Indiana</option>
                <option value="Iowa">Iowa</option>
                <option value="Maryland">Maryland</option>
                <option value="Michigan">Michigan</option>
                <option value="Michigan State">Michigan State</option>
                <option value="Minnesota">Minnesota</option>
                <option value="Nebraska">Nebraska</option>
                <option value="Northwestern">Northwestern</option>
                <option value="Ohio State">Ohio State</option>
                <option value="Penn State">Penn State</option>
                <option value="Purdue">Purdue</option>
                <option value="Rutgers">Rutgers</option>
                <option value="Wisconsin">Wisconsin</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_151213574">
                <div class="ss-q-title">Big 12
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the Big 12
                    Conference
                </div>
            </label>
            <select name="Boption_big12" id="entry_151213574"
                    aria-label="Big 12 Select your team from the Big 12 Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Baylor">Baylor</option>
                <option value="Iowa State">Iowa State</option>
                <option value="Kansas">Kansas</option>
                <option value="Kansas State (K-State)">Kansas State (K-State)</option>
                <option value="Oklahoma">Oklahoma</option>
                <option value="Oklahoma State">Oklahoma State</option>
                <option value="Texas">Texas</option>
                <option value="Texas Christian (TCU)">Texas Christian (TCU)</option>
                <option value="Texas Tech">Texas Tech</option>
                <option value="West Virginia (WVU)">West Virginia (WVU)</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_1832398034">
                <div class="ss-q-title">Pacific-12 (PAC-12)
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the
                    Pacific-12 Conference
                </div>
            </label>
            <select name="Boption_pacific12" id="entry_1832398034"
                    aria-label="Pacific-12 (PAC-12) Select your team from the Pacific-12 Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Arizona">Arizona</option>
                <option value="Arizona State (ASU)">Arizona State (ASU)</option>
                <option value="California (Cal)">California (Cal)</option>
                <option value="Colorado">Colorado</option>
                <option value="Oregon">Oregon</option>
                <option value="Oregon State">Oregon State</option>
                <option value="Southern California (USC)">Southern California (USC)</option>
                <option value="Stanford">Stanford</option>
                <option value="UCLA">UCLA</option>
                <option value="Utah">Utah</option>
                <option value="Washington">Washington</option>
                <option value="Washington State">Washington State</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_1225990882">
                <div class="ss-q-title">Southeastern (SEC)
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the
                    Southeastern Conference
                </div>
            </label>
            <select name="Boption_southeastern" id="entry_1225990882"
                    aria-label="Southeastern (SEC) Select your team from the Southeastern Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Alabama">Alabama</option>
                <option value="Arkansas">Arkansas</option>
                <option value="Auburn">Auburn</option>
                <option value="Florida (UF)">Florida (UF)</option>
                <option value="Georgia">Georgia</option>
                <option value="Kentucky">Kentucky</option>
                <option value="Louisiana State (LSU)">Louisiana State (LSU)</option>
                <option value="Mississippi (Ole Miss)">Mississippi (Ole Miss)</option>
                <option value="Mississippi State">Mississippi State</option>
                <option value="Missouri">Missouri</option>
                <option value="South Carolina">South Carolina</option>
                <option value="Tennessee">Tennessee</option>
                <option value="Texas A&amp;M">Texas A&amp;M</option>
                <option value="Vanderbilt">Vanderbilt</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_675408933">
                <div class="ss-q-title">Non-AQ
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from any Non-AQ
                    Division I FBS Schools
                </div>
            </label>
            <select name="Boption_nonaq" id="entry_675408933"
                    aria-label="Non-AQ Select your team from any Non-AQ Division I FBS Schools "
                    aria-required="true">
                <option value=""></option>
                <option value="Air Force">Air Force</option>
                <option value="Akron">Akron</option>
                <option value="Appalachian State">Appalachian State</option>
                <option value="Arkansas State">Arkansas State</option>
                <option value="Army">Army</option>
                <option value="Ball State">Ball State</option>
                <option value="Boise State">Boise State</option>
                <option value="Bowling Green">Bowling Green</option>
                <option value="Brigham Young (BYU)">Brigham Young (BYU)</option>
                <option value="Buffalo">Buffalo</option>
                <option value="Central Michigan">Central Michigan</option>
                <option value="Colorado State">Colorado State</option>
                <option value="Eastern Michigan">Eastern Michigan</option>
                <option value="Florida Atlantic (FAU)">Florida Atlantic (FAU)</option>
                <option value="Florida International (FIU)">Florida International (FIU)</option>
                <option value="Fresno State">Fresno State</option>
                <option value="Georgia Southern">Georgia Southern</option>
                <option value="Georgia State">Georgia State</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Idaho">Idaho</option>
                <option value="Kent State">Kent State</option>
                <option value="Louisiana Tech (LA Tech)">Louisiana Tech (LA Tech)</option>
                <option value="Marshall">Marshall</option>
                <option value="Miami (Ohio)">Miami (Ohio)</option>
                <option value="Middle Tennessee">Middle Tennessee</option>
                <option value="Navy">Navy</option>
                <option value="Nevada">Nevada</option>
                <option value="New Mexico">New Mexico</option>
                <option value="New Mexico State">New Mexico State</option>
                <option value="Northern Illinois (NIU)">Northern Illinois (NIU)</option>
                <option value="North Texas">North Texas</option>
                <option value="Notre Dame">Notre Dame</option>
                <option value="Ohio">Ohio</option>
                <option value="Old Dominion">Old Dominion</option>
                <option value="Rice">Rice</option>
                <option value="San Diego State">San Diego State</option>
                <option value="San Jose State">San Jose State</option>
                <option value="South Alabama">South Alabama</option>
                <option value="Southern Miss">Southern Miss</option>
                <option value="Texas State">Texas State</option>
                <option value="Toledo">Toledo</option>
                <option value="Troy">Troy</option>
                <option value="UAB (Alabama - Birmingham)">UAB (Alabama - Birmingham)</option>
                <option value="ULL (Louisiana - Lafayette)">ULL (Louisiana - Lafayette)</option>
                <option value="ULM (Louisiana - Monroe)">ULM (Louisiana - Monroe)</option>
                <option value="UMass (Massachusetts)">UMass (Massachusetts)</option>
                <option value="UNLV (Nevada - Las Vegas)">UNLV (Nevada - Las Vegas)</option>
                <option value="Utah State">Utah State</option>
                <option value="UTEP (Texas - El Paso)">UTEP (Texas - El Paso)</option>
                <option value="UTSA (Texas - San Antonio)">UTSA (Texas - San Antonio)</option>
                <option value="Western Michigan">Western Michigan</option>
                <option value="WKU (Western Kentucky)">WKU (Western Kentucky)</option>
                <option value="Wyoming">Wyoming</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>

<div class="ss-item ss-navigate">
    <table id="navigation-table">
        <tbody>
        <tr>
            <td class="ss-form-entry goog-inline-block" id="navigation-buttons" dir="ltr">


            </td>
        </tr>
        </tbody>
    </table>
</div>
</section>
<section>
<h3>Select Winning Team</h3>

<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_1580721518">
                <div class="ss-q-title">American
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the
                    American Athletic Conference
                </div>
            </label>
            <select name="Woption_american" id="entry_1580721518"
                    aria-label="American Select your team from the American Athletic Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Central Florida (UCF)">Central Florida (UCF)</option>
                <option value="Cincinnati">Cincinnati</option>
                <option value="Connecticut (UConn)">Connecticut (UConn)</option>
                <option value="East Carolina (ECU)">East Carolina (ECU)</option>
                <option value="Houston">Houston</option>
                <option value="Memphis">Memphis</option>
                <option value="South Florida (USF)">South Florida (USF)</option>
                <option value="Southern Methodist (SMU)">Southern Methodist (SMU)</option>
                <option value="Temple">Temple</option>
                <option value="Tulane">Tulane</option>
                <option value="Tulsa">Tulsa</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_628928305">
                <div class="ss-q-title">ACC
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the
                    Atlantic Coast Conference
                </div>
            </label>
            <select name="Woption_acc" id="entry_628928305"
                    aria-label="ACC Select your team from the Atlantic Coast Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Boston College (BC)">Boston College (BC)</option>
                <option value="Clemson">Clemson</option>
                <option value="Duke">Duke</option>
                <option value="Florida State (FSU)">Florida State (FSU)</option>
                <option value="Georgia Tech">Georgia Tech</option>
                <option value="Louisville">Louisville</option>
                <option value="Miami">Miami</option>
                <option value="North Carolina (UNC)">North Carolina (UNC)</option>
                <option value="North Carolina State (NC State)">North Carolina State (NC State)
                </option>
                <option value="Pittsburgh (Pitt)">Pittsburgh (Pitt)</option>
                <option value="Syracuse">Syracuse</option>
                <option value="Virginia">Virginia</option>
                <option value="Virginia Tech (VT)">Virginia Tech (VT)</option>
                <option value="Wake Forest">Wake Forest</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_51962862">
                <div class="ss-q-title">Big Ten (B1G)
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the Big Ten
                    Conference
                </div>
            </label>
            <select name="Woption_big10" id="entry_51962862"
                    aria-label="Big Ten (B1G) Select your team from the Big Ten Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Illinois">Illinois</option>
                <option value="Indiana">Indiana</option>
                <option value="Iowa">Iowa</option>
                <option value="Maryland">Maryland</option>
                <option value="Michigan">Michigan</option>
                <option value="Michigan State">Michigan State</option>
                <option value="Minnesota">Minnesota</option>
                <option value="Nebraska">Nebraska</option>
                <option value="Northwestern">Northwestern</option>
                <option value="Ohio State">Ohio State</option>
                <option value="Penn State">Penn State</option>
                <option value="Purdue">Purdue</option>
                <option value="Rutgers">Rutgers</option>
                <option value="Wisconsin">Wisconsin</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_151213574">
                <div class="ss-q-title">Big 12
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the Big 12
                    Conference
                </div>
            </label>
            <select name="Woption_big12" id="entry_151213574"
                    aria-label="Big 12 Select your team from the Big 12 Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Baylor">Baylor</option>
                <option value="Iowa State">Iowa State</option>
                <option value="Kansas">Kansas</option>
                <option value="Kansas State (K-State)">Kansas State (K-State)</option>
                <option value="Oklahoma">Oklahoma</option>
                <option value="Oklahoma State">Oklahoma State</option>
                <option value="Texas">Texas</option>
                <option value="Texas Christian (TCU)">Texas Christian (TCU)</option>
                <option value="Texas Tech">Texas Tech</option>
                <option value="West Virginia (WVU)">West Virginia (WVU)</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_1832398034">
                <div class="ss-q-title">Pacific-12 (PAC-12)
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the
                    Pacific-12 Conference
                </div>
            </label>
            <select name="Woption_pacific12" id="entry_1832398034"
                    aria-label="Pacific-12 (PAC-12) Select your team from the Pacific-12 Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Arizona">Arizona</option>
                <option value="Arizona State (ASU)">Arizona State (ASU)</option>
                <option value="California (Cal)">California (Cal)</option>
                <option value="Colorado">Colorado</option>
                <option value="Oregon">Oregon</option>
                <option value="Oregon State">Oregon State</option>
                <option value="Southern California (USC)">Southern California (USC)</option>
                <option value="Stanford">Stanford</option>
                <option value="UCLA">UCLA</option>
                <option value="Utah">Utah</option>
                <option value="Washington">Washington</option>
                <option value="Washington State">Washington State</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_1225990882">
                <div class="ss-q-title">Southeastern (SEC)
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from the
                    Southeastern Conference
                </div>
            </label>
            <select name="Woption_southeastern" id="entry_1225990882"
                    aria-label="Southeastern (SEC) Select your team from the Southeastern Conference "
                    aria-required="true">
                <option value=""></option>
                <option value="Alabama">Alabama</option>
                <option value="Arkansas">Arkansas</option>
                <option value="Auburn">Auburn</option>
                <option value="Florida (UF)">Florida (UF)</option>
                <option value="Georgia">Georgia</option>
                <option value="Kentucky">Kentucky</option>
                <option value="Louisiana State (LSU)">Louisiana State (LSU)</option>
                <option value="Mississippi (Ole Miss)">Mississippi (Ole Miss)</option>
                <option value="Mississippi State">Mississippi State</option>
                <option value="Missouri">Missouri</option>
                <option value="South Carolina">South Carolina</option>
                <option value="Tennessee">Tennessee</option>
                <option value="Texas A&amp;M">Texas A&amp;M</option>
                <option value="Vanderbilt">Vanderbilt</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>
<div class="ss-form-question errorbox-good" role="listitem">
    <div dir="ltr" class="ss-item ss-item-required ss-select">
        <div class="ss-form-entry">
            <label class="ss-q-item-label" for="entry_675408933">
                <div class="ss-q-title">Non-AQ
                    <label for="itemView.getDomIdToLabel()" aria-label="(Required field)"></label>
                    <span class="ss-required-asterisk">*</span></div>
                <div class="ss-q-help ss-secondary-text" dir="ltr">Select your team from any Non-AQ
                    Division I FBS Schools
                </div>
            </label>
            <select name="Woption_nonaq" id="entry_675408933"
                    aria-label="Non-AQ Select your team from any Non-AQ Division I FBS Schools "
                    aria-required="true">
                <option value=""></option>
                <option value="Air Force">Air Force</option>
                <option value="Akron">Akron</option>
                <option value="Appalachian State">Appalachian State</option>
                <option value="Arkansas State">Arkansas State</option>
                <option value="Army">Army</option>
                <option value="Ball State">Ball State</option>
                <option value="Boise State">Boise State</option>
                <option value="Bowling Green">Bowling Green</option>
                <option value="Brigham Young (BYU)">Brigham Young (BYU)</option>
                <option value="Buffalo">Buffalo</option>
                <option value="Central Michigan">Central Michigan</option>
                <option value="Colorado State">Colorado State</option>
                <option value="Eastern Michigan">Eastern Michigan</option>
                <option value="Florida Atlantic (FAU)">Florida Atlantic (FAU)</option>
                <option value="Florida International (FIU)">Florida International (FIU)</option>
                <option value="Fresno State">Fresno State</option>
                <option value="Georgia Southern">Georgia Southern</option>
                <option value="Georgia State">Georgia State</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Idaho">Idaho</option>
                <option value="Kent State">Kent State</option>
                <option value="Louisiana Tech (LA Tech)">Louisiana Tech (LA Tech)</option>
                <option value="Marshall">Marshall</option>
                <option value="Miami (Ohio)">Miami (Ohio)</option>
                <option value="Middle Tennessee">Middle Tennessee</option>
                <option value="Navy">Navy</option>
                <option value="Nevada">Nevada</option>
                <option value="New Mexico">New Mexico</option>
                <option value="New Mexico State">New Mexico State</option>
                <option value="Northern Illinois (NIU)">Northern Illinois (NIU)</option>
                <option value="North Texas">North Texas</option>
                <option value="Notre Dame">Notre Dame</option>
                <option value="Ohio">Ohio</option>
                <option value="Old Dominion">Old Dominion</option>
                <option value="Rice">Rice</option>
                <option value="San Diego State">San Diego State</option>
                <option value="San Jose State">San Jose State</option>
                <option value="South Alabama">South Alabama</option>
                <option value="Southern Miss">Southern Miss</option>
                <option value="Texas State">Texas State</option>
                <option value="Toledo">Toledo</option>
                <option value="Troy">Troy</option>
                <option value="UAB (Alabama - Birmingham)">UAB (Alabama - Birmingham)</option>
                <option value="ULL (Louisiana - Lafayette)">ULL (Louisiana - Lafayette)</option>
                <option value="ULM (Louisiana - Monroe)">ULM (Louisiana - Monroe)</option>
                <option value="UMass (Massachusetts)">UMass (Massachusetts)</option>
                <option value="UNLV (Nevada - Las Vegas)">UNLV (Nevada - Las Vegas)</option>
                <option value="Utah State">Utah State</option>
                <option value="UTEP (Texas - El Paso)">UTEP (Texas - El Paso)</option>
                <option value="UTSA (Texas - San Antonio)">UTSA (Texas - San Antonio)</option>
                <option value="Western Michigan">Western Michigan</option>
                <option value="WKU (Western Kentucky)">WKU (Western Kentucky)</option>
                <option value="Wyoming">Wyoming</option>
            </select>

            <div class="required-message"></div>
        </div>
    </div>
</div>



</section>
<div class="ss-item ss-navigate">
    <button type="submit" class="btn btn-primary">Submit Form</button>
</div>
<h3 id="last">Last inserted: NONE</h3>

</form>
</body>
</html>