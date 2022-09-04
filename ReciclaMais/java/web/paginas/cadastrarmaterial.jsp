<%@ page import=" dao.MateriaisDao"%>
<jsp:useBean id="u" class="entidades.Material"></jsp:useBean>
<jsp:setProperty property="*" name="u" />

<%
    int i = MateriaisDao.cadastrarMaterial(u);
    
    if(i>0){
        response.sendRedirect("materiaiscontrolar.jsp?pag=1");
    }else{
        response.sendRedirect("erro-erro.jsp");        
    }
%>