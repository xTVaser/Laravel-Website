function clickEdit(commentId, commentBody) {

         $("#comment"+commentId).append("<br><textarea class=\"form-control\" placeholder=\"\" name=\"commentBody\" cols=\"50\" rows=\"10\">"+commentBody+"</textarea>")
         $("#comment"+commentId).append("<input type=\"submit\" name=\"edit_comment\" value=\"Submit Edit\" class=\"btn btn-success\">");

}

function clickReply(commentId) {

        $("#comment"+commentId).append("<br><textarea class=\"form-control\" placeholder=\"Enter your reply..\" name=\"commentBody\" cols=\"50\" rows=\"10\"></textarea>")
        $("#comment"+commentId).append("<input type=\"submit\" name=\"reply_comment\" value=\"Submit Reply\" class=\"btn btn-success\">")
}
