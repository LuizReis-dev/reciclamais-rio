package dao;

import entidades.Catador;
import entidades.Empresa;
import entidades.Funcionario;
import entidades.OperacaoComercial;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

public class OperacaoComercialDao {

    public static int inserirCompra(OperacaoComercial operacaoComercial) {
        int idOperacaoComercial = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("INSERT INTO operacao_comercial(id_catador,tipo,total_sugerido, total_final, id_funcionario) VALUES(?,'c',?,?,?)", Statement.RETURN_GENERATED_KEYS);
            ps.setInt(1, operacaoComercial.getCatador().getId());
            ps.setDouble(2, operacaoComercial.getTotal_sugerido());
            ps.setDouble(3, operacaoComercial.getTotal_final());
            ps.setInt(4, operacaoComercial.getFuncionario().getId());

            ps.executeUpdate();

            ResultSet chaveGerada = ps.getGeneratedKeys();
            if (chaveGerada.next()) {
                idOperacaoComercial = chaveGerada.getInt(1);
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return idOperacaoComercial;
    }

    public static List<OperacaoComercial> getOpComercialPorDia(String dia) {
        List<OperacaoComercial> list = new ArrayList<OperacaoComercial>();
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT * FROM `operacao_comercial` WHERE DATE(data) = '?'");
            ps.setString(1, dia);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
               OperacaoComercial op = new OperacaoComercial();
               op.setId(rs.getInt("id"));
               
               Catador catador = new Catador();
               catador.setId(rs.getInt("id_catador"));
               op.setCatador(catador);
               
               Empresa empresa = new Empresa();
               empresa.setId(rs.getInt("id_empresa"));
               op.setEmpresa(empresa);
              
               Funcionario funcionario = new Funcionario();
               funcionario.setId(rs.getInt("id_funcionario"));
               op.setFuncionario(funcionario);
               
               op.setTipo(rs.getString("tipo").charAt(0));
               op.setTotal_sugerido(rs.getDouble("total_sugerido"));
               op.setTotal_final(rs.getDouble("total_final"));
               op.setData(rs.getDate("data"));
               
               list.add(op);
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return list;
    }

}
