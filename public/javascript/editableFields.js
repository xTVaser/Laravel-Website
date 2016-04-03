function clickEdit(commentId) {

         $("#comment"+commentId).append("<br><textarea class=\"form-control\" placeholder=\"\" name=\"commentBody\" cols=\"50\" rows=\"10\">"+$("#commentText"+commentId).text()+"</textarea>");
         $("#comment"+commentId).append("<input type=\"submit\" name=\"edit_comment\" value=\"Submit Edit\" class=\"btn btn-success\">");

         var button = $("#editButton"+commentId);
         button.prop("disabled",true);

}

function clickReply(commentId) {

        $("#comment"+commentId).append("<br><textarea class=\"form-control\" placeholder=\"Enter your reply..\" name=\"commentBody\" cols=\"50\" rows=\"10\"></textarea>");
        $("#comment"+commentId).append("<input type=\"submit\" name=\"reply_comment\" value=\"Submit Reply\" class=\"btn btn-success\">");

        var button = $("#replyButton"+commentId);
        button.prop("disabled",true);
}
