package dao;

import entidades.Funcionario;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.Objects;

public class FuncionarioDao {

    public static Funcionario login(String login, String senha) {
        Funcionario funcionario = new Funcionario();
        try {
            Connection conn = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) conn.prepareStatement("SELECT * FROM Funcionario Where login = ?");
            ps.setString(1, login);
            ResultSet rs = ps.executeQuery();
           
            if(rs.next()) {
                if(rs.getString("senha").equals(senha)) {
                    funcionario.setId(rs.getInt("id"));
                    funcionario.setFuncao(rs.getString("funcao"));
                    funcionario.setTelefone(rs.getString("telefone"));
                    funcionario.setNome(rs.getString("nome"));
                } else {
                    funcionario = null;
                }
            } else {
                funcionario = null;
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return funcionario;
    }
}
