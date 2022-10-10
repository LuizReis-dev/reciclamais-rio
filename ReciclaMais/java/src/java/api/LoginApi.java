package api;

import dao.FuncionarioDao;
import entidades.Funcionario;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Objects;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.JSONObject;

@WebServlet(name = "LoginApi", urlPatterns = {"/login"})
public class LoginApi extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
        BufferedReader reader = req.getReader();
        StringBuilder jb = new StringBuilder();

        String line;
        while ((line = reader.readLine()) != null) {
            jb.append(line);
        }
        JSONObject dados = new JSONObject(jb.toString());

        String login = dados.getString("login");
        String senha = dados.getString("senha");
        Funcionario funcionario = FuncionarioDao.login(login, senha);
        System.out.println(Objects.isNull(funcionario));
        PrintWriter out = res.getWriter();
        res.setContentType("application/json");
        res.addHeader("Access-Control-Allow-Origin", "null");
        JSONObject retorno = new JSONObject();
        if (Objects.isNull(funcionario)) {
            res.setStatus(400);
            retorno.put("autorizacao", false);
            retorno.put("Mensagem", "não autorizado");
            out.print(retorno.toString());
            out.flush();
        } else {
            retorno.put("autorizacao", true);
            retorno.put("Mensagem", "Usuário logado");
            req.getSession().setAttribute("funcionarioId", funcionario.getId());
            out.print(retorno.toString());
            out.flush();

        }
    }

}
