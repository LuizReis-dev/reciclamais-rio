<%@ page import=" dao.EmpresaDao"%>
<jsp:useBean id="u" class="entidades.Empresa"></jsp:useBean>
<jsp:setProperty property="*" name="u" />

<%
    int i = EmpresaDao.cadastrarEmpresa(u);
    
    if(i>0){
        response.sendRedirect("empresascontrolar.jsp?pag=1");
    }else{
        response.sendRedirect("erro-erro.jsp");        
    }
%>