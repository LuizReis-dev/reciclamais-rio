/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package api;

import dao.BonificacaoDao;
import entidades.Bonificacao;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.List;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.JSONObject;

/**
 *
 * @author Camila
 */
@WebServlet(name = "teste", urlPatterns = {"/teste"})
public class teste extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        List<Bonificacao> lista = BonificacaoDao.getBonificacoes(1, 5);
        JSONObject retorno = new JSONObject();
        retorno.put("teste", lista);

        PrintWriter out = response.getWriter();

        out.print(retorno.toString());
        out.flush();

    }

}
