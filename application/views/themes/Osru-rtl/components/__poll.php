<?php if(!empty($pull['question'])){?>

    <form action="javascript:pollTest();" method="post">

        <div class="donation_widget mt-4">

            <div class="result"></div>
            <h4 class="donation_title"><?php echo html_escape(@$pull['question'])?></h4>

            <div class="donation_header" id="resultview">
                <input type="hidden" id="question_id" value="<?php echo @$pull['id']; ?>" />
                <div class="radio radio-danger">
                    <input type="radio" name="radio2" id="radio3" value="yes">
                    <label for="radio3"> <?php echo display('yes')?> </label>
                    <span class="vote-count"><?php echo html_escape(@$pull['yes'])?>%</span>
                </div>
                <div class="radio radio-danger">
                    <input type="radio" name="radio2" id="radio4" value="no" >
                    <label for="radio4"> <?php echo display('no')?> </label>
                    <span class="vote-count"><?php echo html_escape(@$pull['no'])?>%</span>
                </div>
                <div class="radio radio-danger">
                    <input type="radio" name="radio2" id="radio5" value="on_comment">
                    <label for="radio5"> <?php echo display('no_comment')?> </label>
                    <span class="vote-count"><?php echo html_escape(@$pull['on_comment'])?>%</span>
                </div>
            </div>
            <button type="submit" name="vote_submit" class="btn link-btn"><?php echo makeString(['submit','vote'])?>  ⇾</button>

        </div>

    </form>

<?php }?>