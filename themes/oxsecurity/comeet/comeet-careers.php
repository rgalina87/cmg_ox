<?php //CMG: custom careers page ?>






<?php
/**
 * gidi add dropdowns for Job Openings search
 */
function filter_ox_only($var){
    $isOX=false;
    foreach($var['categories'] as $c){
        if(strtolower($c['value'])=='ox security')
            $isOX = true;
    }
    return $isOX;
}
$data_ox_only=array_filter($data, "filter_ox_only");
//  echo '<h3>data_ox_only('.count($data_ox_only).')</h3> <pre style="font-size:11px; line-height:13px;">'.print_r($data_ox_only,1).'</pre>';

 // prep arrays of departments and locations (from ready made $data_ox_only var by comeet plugin)
 error_reporting(E_ALL);
 $all_locations=array();
 $department_locations=array();
//  echo '<h3>data</h3><pre style="font-size:11px; line-height:13px;">'.print_r($data_ox_only,1).'</pre>';
 foreach($data_ox_only as $d){
    $dep = $d["department"];
    $loc = $d["location"]["name"];

    if(!isset($department_locations[$dep])) $department_locations[$dep] = array();
    $department_locations[$dep] []= $loc;

    $all_locations[]=$loc;
 }
 $all_locations = array_unique($all_locations);

 // make each department location array unique
 forEach($department_locations as $key=>$val){
    $department_locations[$key] = array_unique($val);
 }

// arrays into js
echo "<script>";
echo "all_job_locations='".implode("|",$all_locations)."';";
echo "all_job_locations=all_job_locations.split('|');";
echo "department_locations={};";
forEach($department_locations as $k=>$v){
    echo "if(!department_locations['".$k."']) department_locations['".$k."']=[];\n"; 
    foreach($v as $loc){
        // echo "//".$k.".push('"+$loc+"')";
        echo "department_locations['".$k."'].push('".$loc."');\n";
    }
}
echo "</script>";
// ! prep arrays of departments and locations
?>



<script>
function showAllJobs(){
    jQuery(".comeet-position").show();
}
function showAllDepartments(){
    jQuery(".comeet-g-r").show();
}
function showHidByText(){
    jQuery("li.comeet-position").removeClass("hidden");
}
function hideEmptyDepartments(){
    jQuery("div.comeet-g-r:not(:has(li:visible))").hide()
}
function showResults(){
    // by all dropdowns
    selected_department = jQuery("select#sel-department option:selected").val();
    selected_location = jQuery("select#sel-location option:selected").val();
    s = jQuery("#search-term").val();
    
    showAllDepartments();
    showAllJobs();
    showHidByText();

    // Departments
    if(selected_department!='all'){
            let q = ".comeet-groups-list > div:not([data-department='"+selected_department+"'])";
            let non_department_divs = jQuery(q);
            non_department_divs.hide();
            console.log("hid ", non_department_divs.length, "departments");
    }

    // Locations
    if(selected_location!="all"){ 
        let q = ".comeet-groups-list > div .comeet-positions-list  li.comeet-position:not([data-location='"+selected_location+"'])";
        let non_location_divs = jQuery(q);
        non_location_divs.hide();
            console.log("hid ", non_location_divs.length, "locations");
    }

    // text
    let hidByText=0;
    jQuery("div.comeet-position-name").each(function(i){
        let t = this.innerHTML;
        if(!t.includes(s)){
            console.log("found",s, "in" , t);
            jQuery(this).parents("li").hide();//addClass("hidden");
            hidByText++;
        }
    })
    console.log("hid ", hidByText, "by text");

    hideEmptyDepartments();
}


jQuery(document).ready(function () { 

    // fill departments select
    jQuery("select#sel-department").empty();
    jQuery("select#sel-department").append(jQuery("<option></option>").attr("value", "all").text("All"));
    jQuery.each( department_locations , function(k,v){
        locCnt=department_locations[k].length;
        jQuery("select#sel-department").append(jQuery("<option></option>").attr("value", k).text(k+"("+locCnt+")"));
    })

    // fill locations select (all locations at first)
    jQuery("select#sel-location").empty();
    jQuery("select#sel-location").append(jQuery("<option></option>").attr("value", "all").text("All"));    
    all_job_locations.forEach((loc)=>{
            jQuery("select#sel-location").append(jQuery("<option></option>").attr("value", loc).text(loc));
    })


    /* ---------Job openings dropdown filters (css hiding)---------- */

    // department selected - hide other departments
    jQuery("select#sel-department").change(()=>{
        selected_department = jQuery("select#sel-department option:selected").val();

        // set locations dropdown to the selected department's locations
        jQuery("select#sel-location").empty();
        jQuery("select#sel-location").append(jQuery("<option></option>").attr("value", "all").text("All"));
        if(selected_department=='all'){
            all_job_locations.forEach((v,i)=>{
                jQuery("select#sel-location").append(jQuery("<option></option>").attr("value", v).text(v));
            });        
        } else {
            department_locations[selected_department].forEach((v,i)=>{
                // console.log("--",i,v);
                jQuery("select#sel-location").append(jQuery("<option></option>").attr("value", v).text(v));
            });
        }

        showResults();
    })
    
    // location selected - hide other locations
    jQuery("select#sel-location").change(()=>{
        showResults();
    })

    // by text
    jQuery("#search-term").on("input",()=>{
        showResults();
    });
    
    hideEmptyDepartments();    
});

</script>


<!----- FILTERS ----->
<div id="job-openings-wrap">
    <div class="job-openings-inner">


        <div class="job-openings-filters">

            <div class="job-openings-filter">
                <label for="search-term">Free text</label>
                <input type="text" id="search-term" name="search-term" value="" placeholder="Free text" />
            </div>

            <div class="job-openings-filter">
                <label for="sel-department">Department</label>
                <select id="sel-department" placeholder="fasdf">
                </select>
            </div>

            <div class="job-openings-filter">
                <label for="sel-location">Location</label>
                <select id="sel-location">
                </select>
            </div>
        </div>
    </div>
</div>

<style>
    /* job openings filters */
    /* .hidden{ display:none;} */

    .job-openings-filters{
        display:flex;
        justify-content: space-between;
    }

    .job-openings-filter{
        width: 30%;
        margin:10px 0;
    }
    /* ! job openings filters */
</style>
<?php
/**
 * ! gidi add dropdowns for Job Openings search
 */
?>









<!----- Job Listing ----->
<div class="comeet-outer-wrapper">
    <?php
    if (isset($comeet_groups) && !empty($comeet_groups)) {
    ?>
        <div id="d" class="comeet-groups-list">
            <?php
            foreach ($comeet_groups as $category) {
            ?>
                <div class="comeet-g-r" data-department="<?= $category ?>">
                    <div class="comeet-u-1-2">
                        <div class="comeet-list comeet-group-name">
                            <?= $this->generate_page_titles(false, $category, false, $base) ?>
                        </div>
                    </div>
                    <div class="comeet-u-1-2">
                        <div class="comeet-list">
                            <ul class="comeet-positions-list">
                                <?php
                                if (isset($data_ox_only)) {
                                    foreach ($data_ox_only as $post) {

                                        // filter out non OX Security
                                        // if(!str_contains($post['name'],"OX Security") && !str_contains($post['name'],"Ox Security")){
                                        //     continue;
                                        // }

                                        if (isset($group_element)) {
                                            if ($this->check_comeet_is_category($post, $group_element, $category)) {
                                                $href = $this->generate_careers_url($base, $category, $post);
                                ?>
                                                <li class="comeet-position" data-location="<?= $post['location']['name'] ?>">
                                                    <a href="<?= $href ?>">

                                                        <div class="comeet-position-name">
                                                            <?= $post['name'] ?>
                                                        </div>

                                                        <div class="comeet-position-meta department">
                                                            <?php echo $post['department']; ?>
                                                        </div>

                                                        <div class="comeet-position-meta location">
                                                            <?php echo $post['location']['name']; ?>
                                                        </div>

                                                        <?php /*
                                                        <div class="comeet-position-name" style="font-size:11px;">
                                                            company:<?= $post['company_name'] ?>
                                                        </div>

                                                        <div class="comeet-position-name" style="font-size:11px;">
                                                            cat0name:<?= $post['categories'][0]['name'] ?>,cat0val:<?= $post['categories'][0]['value'] ?>
                                                        </div>
                                                        */ ?>
                                                        
                                                    </a>
                                                </li>
                                <?php
                                            }
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    <?php
    } else {
        echo "We don't have any open positions at this time. Please visit again soon.";
    }
    ?>
    <?php
    /* 
    cmg:removed
    include('version-comments.php');*/
    ?>
</div>


<style>
    
    .comeet-list .comeet-position a {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #FFFFFF;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        padding: 12px;
transition: 0.3s all;
    }
    .comeet-list .comeet-position a:hover{
        background: #6A2BFF;
        color: #fff;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
    }
</style>