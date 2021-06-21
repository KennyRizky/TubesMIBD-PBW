<h1 id="addExam">Add Exam</h1>
<div id="kotak_addExam">
<div>
    <form action="" method="POST" id="addExam">
        <p class="addExamForm">Add Question</p>
        <textarea type="text" name="question" id="question" class="addExamForm" placeholder="Insert Question" rows="10" cols="85"></textarea>
        <p class="addExamForm">Insert Option</p>
        <div id="option">
            A <input type="text" name="optionContentA" class="optionContent">
            <br><br>
            B <input type="text" name="optionContentB" class="optionContent">
            <br><br>
            C <input type="text" name="optionContentC" class="optionContent">
            <br><br>
            D <input type="text" name="optionContentD" class="optionContent">
            <br><br>
            Correct Answers: 
            <select>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
            </select>
        </div>
        <input type="submit" value="Upload Exam" id="uploadExamBtn">
    </form>
</div>
</div>