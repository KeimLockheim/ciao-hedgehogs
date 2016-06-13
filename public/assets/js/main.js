$(function(){
    initHandler();

}
  
  function initHandler() {
        $('#SendAnswer').on('click', addAnswerQuestion);
        $('#SendQuestion').on('click', addQuestion);
        $('#publish').on('click', publishQuestionAnswer);
        $('#AddTopic').on('click', AddTopic);
        $('#validateTopic').on('click', validateTopic);
        $('#addPost').on('click', addPost);

   
}